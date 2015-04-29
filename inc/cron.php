<?php

/******************************************************************************/
/*                                                                            */
/* Pix : Hébergement d'images                                                 */
/*                                                                            */
/******************************************************************************/
/*                                                                            */
/* Auteur:                                                                    */
/*     - Mickael BLATIERE (mickael@saezlive.net)                              */
/*                                                                            */
/* Contributeurs :                                                            */
/*     - ZeR0^ (zero@toile-libre.org)                                         */
/*     - NiZoX (nizox@alterinet.org)                                          */
/*                                                                            */
/* Licence : GPL                                                              */
/*                                                                            */
/******************************************************************************/


$last = file_exists($config['file_cron']) ? file_get_contents($config['file_cron']) : '0';

$now = time();

if ($last + $config['cron'] < $now) {
    file_put_contents($config['file_cron'], $now);

    require_once CLASSES . 'Image.php';
    if ($config['rebuildtags']) {
        Image::rebuildTagCloud();
    }

    /* compute used space */
    $totalsize = Image::getTotalSize();
    file_put_contents($config['file_totalsize'], $totalsize);
}



