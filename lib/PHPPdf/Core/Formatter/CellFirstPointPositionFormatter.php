<?php

/*
 * Copyright 2011 Piotr Śliwa <peter.pl7@gmail.com>
 *
 * License information is in LICENSE file
 */

namespace PHPPdf\Core\Formatter;

use PHPPdf\Core\Document;
use PHPPdf\Core\Node\Node;

/**
 * @author Piotr Śliwa <peter.pl7@gmail.com>
 */
class CellFirstPointPositionFormatter extends BaseFormatter
{
    public function format(Node $node, Document $document)
    {
        $parent = $node->getParent();
        $boundary = $node->getBoundary();

        $boundary->setNext($parent->getFirstPoint());
    }
}