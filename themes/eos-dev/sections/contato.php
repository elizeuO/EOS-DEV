<div class="c-section c-section--grafitti" id="contato">
    <div class="c__container">
        <div class="l-flex l-flex--center l-flex--negative l-flex--wrap">
            <article class="l__col-6">

                <h2 class="c__title">
                    Fale comigo
                </h2>
                <p>
                    <b>Chegou a melhor hora!</b>
                    Me mande uma mensagem para que possamos alinhar a melhor solução para o seu
                    negócio. Pode ser através do formulário ou através dos contatos abaixo.
                </p>
                <p>
                    <b>
                        Até breve =)
                    </b>
                </p>


                <?= do_shortcode('[contact-form-7 id="2674c3b" title="Contato"]') ?>

            </article>
            <article class="l__col-6 c-contact-info-column">
                <img src="<?= getThemeImage('contact-image.webp') ?>" alt="Contato">

                <ul class="c-contact-info">

                    <li>
                        <a href="<?= getSiteInfo('email', true) ?>">
                            <i class="fa-solid fa-envelope"></i>
                            <b>E-mail: </b>
                            <?= getSiteInfo('email') ?>
                        </a>
                    </li>

                    <li>
                        <a href="<?= getSiteInfo('whatsapp', true) ?>">
                            <i class="fa-brands fa-whatsapp"></i>
                            <b>Whatsapp: </b>
                            <?= getSiteInfo('whatsapp') ?>
                        </a>
                    </li>

                    <li>
                        <a href="<?= getSiteInfo('linkedin') ?>">
                            <i class="fa-brands fa-linkedin-in"></i>
                            <b>Linkedin</b>
                        </a>
                    </li>

                    <li>
                        <a href="<?= getSiteInfo('github') ?>">
                            <i class="fa-brands fa-github"></i>
                            <b>Github: </b>
                            elizeuO
                        </a>
                    </li>

                </ul>
            </article>
        </div>
    </div>
</div>