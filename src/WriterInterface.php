<?php

namespace Remorhaz\JSON\Data;

interface WriterInterface extends SelectorInterface
{


    /**
     * @param ReaderInterface $source
     * @return $this
     */
    public function replaceData(ReaderInterface $source);


    /**
     * @param ReaderInterface $source
     * @return $this
     */
    public function insertProperty(ReaderInterface $source);


    /**
     * @return $this
     */
    public function removeProperty();


    /**
     * @param ReaderInterface $source
     * @return $this
     */
    public function appendElement(ReaderInterface $source);


    /**
     * @param ReaderInterface $source
     * @return $this
     */
    public function insertElement(ReaderInterface $source);


    /**
     * @return $this
     */
    public function removeElement();
}
