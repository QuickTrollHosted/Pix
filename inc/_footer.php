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
/*     - bencoh (bencoh@notk.org)                                             */
/*                                                                            */
/* Licence : GPL                                                              */
/*                                                                            */
/******************************************************************************/


?>
        <div class="clearfix"></div>
        </div>
        <div id="footer">
            <b>
            <?php echo Image::getCount(); ?> Images - 
            <?php echo User::getCount(); ?> Utilisateurs - 
            <?php echo Image::getTotalHumanSize(); ?> -
            </b>
            <a href="http://pix.toile-libre.org/pix-1.3.tar.gz">Pix 1.3-release</a> -
            <?php echo $config['footer']; ?>
        </div>
        <div style="background-image: url(<?php echo $config['url']; ?>?action=cron);"></div>
    </body>
</html>
