<section class="contact-area section-padding-100 bg-img bg-overlay bg-fixed has-bg-img"
    style="background-image: url(images/frontend/bg-img/bg-03.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading white wow fadeInUp" data-wow-delay="100ms">
                    <p>Fale com</p>
                    <h2>Lucas Akira e Fábio</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <!-- Contact Form Area -->
                <div class="contact-form-area">
                    <form action="/enviar" id="form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group wow fadeInUp" data-wow-delay="100ms">
                                    <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group wow fadeInUp" data-wow-delay="200ms">
                                    <input type="email" class="form-control" id="email" placeholder="E-mail" name="email">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group wow fadeInUp" data-wow-delay="300ms">
                                    <input type="text" class="form-control" id="assunto" placeholder="Assunto" name="assunto">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group wow fadeInUp" data-wow-delay="400ms">
                                    <textarea name="mensagem" class="form-control" id="mensagem" cols="30" rows="10" placeholder="Mensagem"></textarea>
                                </div>
                            </div>
                            <div class="col-12 text-center wow fadeInUp" data-wow-delay="500ms">
                                <button class="btn oneMusic-btn mt-30" type="submit">Enviar <i class="fa fa-angle-double-right"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
