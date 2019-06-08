<?php
namespace Jfdl\CommonBundle\Twig\Extension;


class AppExtension extends \Twig_Extension
{

    public function getName()
    {
        return 'twigext';
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('hr_file_size', array($this, 'hrFileSize')),
        );
    }

    /**
     * Formate une taille de fichier en une représentation lisible par une personne normallement constituée
     * @param int $size
     * @return string
     */
    public function hrFilesize($size)
    {
        $filesizename = array(" Bytes", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");
        return $size ? round($size/pow(1024, ($i = floor(log($size, 1024)))), 2) . $filesizename[$i] : '0 Bytes';
    }
}
