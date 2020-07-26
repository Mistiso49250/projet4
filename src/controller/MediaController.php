<?php
declare(strict_types=1);

namespace Oc\Controller;

use Oc\Model\MediaManager;

class MediaController
{
    private $media;

    public function adminIndex($id)
    {
        $this->loadModel = new MediaManager();
    }
}