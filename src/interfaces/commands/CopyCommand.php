<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 1/27/18
 * Time: 3:07 PM
 */

namespace frostealth\yii2\aws\s3\commands;


use frostealth\yii2\aws\s3\interfaces\commands\HasBucket;
use frostealth\yii2\aws\s3\interfaces\commands\PlainCommand;

class CopyCommand implements PlainCommand, HasBucket
{
    protected $args = [];

    public function getBucket()
    {
        return $this->args['Bucket'] ?? '';
    }

    public function inBucket(string $bucket)
    {
        $this->args['Bucket'] = $bucket;

        return $this;
    }

    /**
     * @return string
     */
    public function getTargetFilename(): string
    {
        return $this->args['Key'] ?? '';
    }

    /**
     * @param string $filename
     *
     * @return $this
     */
    public function withTargetFilename(string $filename)
    {
        $this->args['Key'] = $filename;

        return $this;
    }

    /**
     * @return string
     */
    public function getCopySource(): string
    {
        return $this->args['CopySource'] ?? '';
    }

    /**
     * @param string $copySource
     *
     * @return $this
     */
    public function withCopySource(string $copySource)
    {
        $this->args['CopySource'] = $copySource;

        return $this;
    }

    /**
     * @internal used by the handlers
     *
     * @return string
     */
    public function getName(): string
    {
        return 'CopyObject';
    }

    /**
     * @internal used by the handlers
     *
     * @return array
     */
    public function toArgs(): array
    {
        return $this->args;
    }
}