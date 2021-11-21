<div class="container">
    <div class="form_datos">
        <form action="" class="container__form">
            <div class="form__group">
                <label>Domicilio social</label>
                <input type="text" value="{{ $padron->domicilio }}">
            </div>
            <div class="form__group">
                <label>Ciudad</label>
                <input type="text" value="{{ $padron->ciudad }}">
            </div>
            <div class="form__group">
                <label>Estado</label>
                <input type="text" value="{{ $padron->entidad }}">
            </div>
            <div class="form__group">
                <label>Teléfono</label>
                <input type="text" value="{{ $padron->telefono }}">
            </div>
            <div class="form__group">
                <label>R.F.C</label>
                <input class="input_rfc" type="text" value="{{ $padron->rfc }}">
                <label class="label_persona">Persona</label>
                <input class="input_persona" type="text" value="{{ $padron->tipo_persona }}">
            </div>
            <div class="form__group">
                <label>Giros</label>
                <input type="text" value="">
            </div>
            <div class="form__group">
                <label>Capital contable</label>
                <input type="text" value="{{ $padron->capital_contable }}">
            </div>
        </form>
        <div class="container__side">
            <img src="{{ asset('img/tuchtlan-inicio.png') }}" alt="Image">
        </div>
    </div>
    <div class="form_representante">
        <input type="text" value="{{ $padron->nombres }} {{ $padron->apellidos }}">
        <label for="">Nombre y firma del representante legal</label>
    </div>
    <div class="form_footer">
        <label for="">Dirección de adquisiciones</label>
    </div>
    <hr>
    <div class="fundamento">
        <div class="fundamento__description">
            <img class="img_left" src="" alt="">
            <p>Con fundamento en el Artículo 73 de la Ley de Adquisiciones, Arrendamiento de Bienes Muebles y
                Contratación de Servicios para el Estado de Chiapas y Artículo 40 Fracción XIII, Penúltimo párrafo del
                Reglamento de Adquisiciones, Arrendamiento de Bienes Muebles y la Contratación de Servicios Para el
                Ayuntamiento de Tuxtla Gutiérrez, Chiapas. La presenta acredita a la empresa:
            </p>
            <img class="img_right" src="{{ asset('img/logo-rojo.jpg') }}" alt="img_logo">
        </div>
        @if (($padron->tipo_persona == 'Persona moral') | ($padron->tipo_persona == 'Moral'))
            <div class="fundamento__razon">
                <label>Razón social:</label>
                <input type="text" value="{{ $padron->razon_social }}">
            </div>
        @endif
        <div class="fundamento__footer">
            <div class="datos">
                <label for="">N° DE PROVEEDOR:</label>
                <input type="text" value="000/2021">
                <label for="">VIGENCIA</label>
                <label for="">31/12/2022</label>
            </div>
            <div class="firma">
                <div class="campo_firma">

                </div>
                <label for="">C.P. ELAY MARTÍNEZ CASTRO</label>
                <label for="">Director de Adquisiciones</label>
            </div>
        </div>

    </div>
    <div class="footer">
    </div>
</div>
