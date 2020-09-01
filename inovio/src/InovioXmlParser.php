<?php
namespace Inovio;

/**
 * To validate & parse XML response.
 */
class InovioXmlParser
{
    private function __construct()
    {
    }
    private function __clone()
    {
    }
    private function __wakeup()
    {
    }

    /**
     * To parse the xml response.
     * @param  string $string [description]
     * @return array  $result [description]
     */
    public static function parse($string)
    {
        $xml = simplexml_load_string($string);

        $result = array();
        $result[$xml->getName()] = self::normalize($xml);

        return $result;
    }

    /**
     * To convert xml object into array
     * @param  object  $object  xml object of gateway response
     * @param  boolean $inArray [description]
     * @return object           [description]
     */
    private static function normalize($object, $inArray = false)
    {
        $result = array();

        foreach ($object->children() as $node) {
            $name = $node->getName();
            $type = $node['type'];

            switch ($type) {
                case 'boolean':
                    $res = (string) $node === 'true';
                    break;

                case 'integer':
                    $res = (integer) $node;
                    break;

                case 'array':
                    $res = self::normalize($node, true);
                    break;

                default:
                    if (count($node->children())) {
                        $res = self::normalize($node);
                    } else {
                        // Deal with items that should just be an array of attributes
                        if ($node->attributes()) {
                            $res = array();
                            foreach ($node->attributes() as $k => $v) {
                                $res[$k] = (string) $v;
                            }
                            $text = (string) $node;

                            if (!empty($text)) {
                                $res['$t'] = $text;
                            }
                        } else {
                            $res = (string) $node;
                        }
                    }
                    break;
            }

            if (array_key_exists($name, $result) || $inArray) {
                $inArray = true;

                if (!isset($result[0]) && isset($result[$name])) {
                    $result = array($result[$name]);
                }
                $result[] = $res;
            } else {
                $result[$name] = $res;
            }
        }

        return $result;
    }
} ## end class InovioXmlParser
