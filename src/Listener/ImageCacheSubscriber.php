<?php
namespace App\Listener;
use App\Entity\Ressource;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreFlushEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Liip\ImagineBundle\Imagine\Cache\CacheManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;

class ImageCacheSubscriber implements EventSubscriber
{

    /**
     * @var CacheManager
     */
    private $CacheManager;
    /**
     * @var UploaderHelper
     */
    private $UploderHelper;

    public function __construct(CacheManager $CacheManager, UploaderHelper $UploderHelper)
    {
        $this->CacheManager = $CacheManager;
        $this->UploderHelper = $UploderHelper;
    }

    public function getSubscribedEvents()
    {
        return [
            'preRemove',
            'preUpdate'
        ];
    }
    public function preRemove(LifecycleEventArgs $args){
        $entity=$args->getEntity();
        if (!$entity instanceof Ressource){
            return;
        }
        $this->CacheManager->remove($this->UploderHelper->asset($entity ,'imageFile'));
    }
    public function preUpdate(LifecycleEventArgs $args){
        $entity=$args->getEntity();
        if (!$entity instanceof Ressource){
            return;
        }
        if($entity->getImageFile() instanceof UploadedFile){
            $this->CacheManager->remove($this->UploderHelper->asset($entity ,'imageFile'));
        }
    }
}
