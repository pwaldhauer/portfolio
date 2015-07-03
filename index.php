<!DOCTYPE>
<html>
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="dist/all.css">

    <title>philippwaldhauer.de</title>
</head>
<body>

<?php require('lib.php') ?>
<?php $data = require('data.php') ?>
<?php $sliders = []; ?>

<div class="header">

    <div class="header__wrapper">
        <div class="header__wrapperwrapper">
            <img class="header__avatar" src="img/philipp.jpg">

            <h1>Philipp Waldhauer</h1>

            <h2>Software Engineer</h2></div>
    </div>
</div>


<div class="timeline">

    <div class="intro">
        <p>Hallo, ich bin Philipp! Aktuell arbeite ich als Softwareentwickler bei <a href="http://nerdlichter.com">Nerdlichter</a>
            in Hamburg. Auf dieser Seite möchte ich chronologisch alles sammeln, was ich so mache. Angefangen bei
            kleineren Blogeinträgen bis hin zu größeren Projekten.</p>

        <p>Mehr Informationen zu mir gibt's in <a href="https://knuspermagier.de">meinem Blog</a>, empfehlenswerte Links
            teile ich auf <a href="http://supermagier.de">supermagier.de</a> und mein <a
                href="http://github.com/pwaldhauer">GitHub-Profil</a> ist vielleicht auch interessant. Noch Fragen
            offen? <a href="mailto:ich@philippwaldhauer.de">Schick mir eine E-Mail</a>!</p>

    </div>

    <?php foreach ($data as $year => $items): ?>
        <div class="timeline__year">
            <div class="timeline__header">
                <div class="line"></div>
                <span class="header__year"><span><?= $year ?></span></span>
            </div>

            <?php foreach ($items as $item): ?>

                <?php if ($item['type'] === 'link'): ?>

                    <div class="year__box box__link">
                        <span><a href="<?= $item['link'] ?>">“<?= $item['title'] ?>”</a></span>
                    </div>

                <?php elseif ($item['type'] === 'small'): ?>
                    <div
                        class="year__box box__small <?php if (!empty($item['image'])): ?>box__small--withimage<?php endif ?>">
                        <div class="small__wrapper">
                            <div class="small__header">
                                <h2><a href="<?= $item['link'] ?>"><?= $item['title'] ?></a></h2>
                                <?php if (!empty($item['tags'])): ?>
                                    <ul class="tag__list">
                                        <?php foreach ($item['tags'] as $tag): ?>
                                            <li class="tag__item <?= tagname($tag) ?>"><?= $tag ?></li>
                                        <?php endforeach ?>
                                    </ul>
                                <?php endif ?>
                            </div>

                            <p class="small__description"><?= $item['description'] ?></p>
                        </div>

                        <?php if (!empty($item['image'])): ?>
                            <div class="small__image">
                                <?= tag_for_image($item['image']) ?>
                            </div>
                        <?php endif ?>

                    </div>
                <?php elseif ($item['type'] === 'big'): ?>
                    <?php $id = slug(uniqid());
                    $sliders[$id] = ['paginate' => (count($item['image']) > 1)] ?>
                    <div class="year__box box__big" style="background-color: <?= $item['dark_color'] ?>">
                        <div class="big__images swiper-container big__images__<?= $id ?>"
                             style="background-color: <?= $item['light_color'] ?>">
                            <div class="images__wrapper swiper-wrapper">
                                <?php foreach ($item['image'] as $image): ?>
                                    <div class="images__slide swiper-slide">
                                        <?= tag_for_image($image) ?>
                                    </div>
                                <?php endforeach ?>
                            </div>

                            <div class="swiper-pagination pagination__<?= $id ?>"></div>
                        </div>
                        <div class="big__wrapper">
                            <div class="small__header">
                                <h2><a href="<?= $item['link'] ?>"><?= $item['title'] ?></a></h2>
                                <?php if (!empty($item['tags'])): ?>
                                    <ul class="tag__list">
                                        <?php foreach ($item['tags'] as $tag): ?>
                                            <li class="tag__item"><?= $tag ?></li>
                                        <?php endforeach ?>
                                    </ul>
                                <?php endif ?>
                            </div>

                            <p class="small__description"><?= $item['description'] ?></p>
                        </div>
                    </div>


                <?php endif ?>
            <?php endforeach ?>
        </div>

    <?php endforeach ?>

</div>

<div class="footer">
    <a href="https://knuspermagier.de/impressum">Impressum</a>
</div>
<script src="dist/swiper/swiper.min.js"></script>
<script>
    window.onload = function () {
        <?php foreach($sliders as $slider => $options): ?>

        var swiper_<?=$slider?> = new Swiper('.big__images__<?=$slider?>', {
            direction: 'horizontal',

            <?php if($options['paginate']): ?>

            loop: true,
            spaceBetween: 30,
            pagination: '.pagination__<?=$slider?>',
            paginationClickable: true

            <?php endif ?>

        });

        <?php endforeach ?>
    };
</script>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-1739006-6']);
    _gaq.push(['_trackPageview']);
    _gaq.push(['_gat._anonymizeIp']);


    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();

</script>
</body>
</html>
