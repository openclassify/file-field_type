<?php namespace Anomaly\FileFieldType;

use Anomaly\Streams\Platform\Support\Parser;

/**
 * Class FileFieldTypeParser
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\FileFieldType
 */
class FileFieldTypeParser
{

    /**
     * The parser utility.
     *
     * @var Parser
     */
    protected $parser;

    /**
     * Create a new FileFieldTypeParser instance.
     *
     * @param Parser $parser
     */
    public function __construct(Parser $parser)
    {
        $this->parser = $parser;
    }

    /**
     * Return the parsed target.
     *
     * @param               $target
     * @param FileFieldType $fieldType
     * @return mixed
     */
    public function parse($target, FileFieldType $fieldType)
    {
        $entry = $fieldType->getEntry();

        return $this->parser->parse($target, compact('entry'));
    }
}
