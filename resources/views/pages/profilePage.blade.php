@include('partials._header')
<div>
    <x-navigation/>
</div>

<div class="mt-5 pt-5 container">

    <section class="container">
        <div>
            <img src="{{ asset('storage/profile-pics/cyrus-HAgAlfz9zyCyEHbwRgQjTxButfbQTaScgC0mUSvz.jpg') }}" alt="" class="rounded-circle users-status">
            <p class="mt-2">Louie Jay Cantores</p>
        </div>
    </section>
    <hr>
    <section>
        <ul>
            <li class="list-unstyled">
                <p>About me: </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo et voluptatibus numquam autem magnam nihil vero libero explicabo tenetur blanditiis, sunt eum alias voluptas accusamus maiores beatae voluptatum distinctio doloremque?
                </p>
            </li>
            <li class="list-unstyled">
                <p>Age: 16</p>
            </li>
        </ul>
    </section>

</div>

@include('partials._footer')