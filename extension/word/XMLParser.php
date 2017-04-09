<?php
/**
 * Created by PhpStorm.
 * User: HOANDHTB
 * Date: 4/7/2017
 * Time: 3:50 PM
 */

namespace app\extension\word;


class XMLParser
{
    private $parser;

    function __construct()
    {
        $this->parser = xml_parser_create();

        xml_set_object($this->parser, $this);
        xml_set_element_handler($this->parser, "tag_open", "tag_close");
        xml_set_character_data_handler($this->parser, "cdata");
    }

    function __destruct()
    {
        xml_parser_free($this->parser);
        unset($this->parser);
    }

    function parse($data)
    {
        xml_parse($this->parser, $data);
    }

    function tag_open($parser, $tag, $attributes)
    {
        var_dump($tag, $attributes);
    }

    function cdata($parser, $cdata)
    {
        var_dump($cdata);
    }

    function tag_close($parser, $tag)
    {
        var_dump($tag);
    }
}
