@extends('base')

@section('title', 'About')

@section('content')
<div class="container">
    <div id="about-img" class="col-lg-12">
            <img src=" {{ asset('storage/images/img2.jpg')}}" alt="" class="img-fluid">
    </div>
    <div id="about-box" class="m-3">
            <div class="about-box">
                <fieldset>
                    <legend><h2>historique du Club</h2></legend>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo, nisi quae facilis, voluptatibus a rerum modi repellat eligendi minima perspiciatis repellendus similique. Totam corporis autem eum ducimus blanditiis minima reiciendis iure, dolorem voluptatibus sunt facilis, similique minus est non numquam?</p>
                </fieldset>
                <div class="member-box">
                    <h1>Les membres fondateurs</h1>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus magnam est aut odio similique amet consequuntur quis doloremque, atque, et, saepe accusantium dolores architecto! Earum harum eius aliquid. Vitae recusandae eum asperiores quos ea illum pariatur ad laudantium. Incidunt eligendi expedita perspiciatis consequuntur culpa veritatis nesciunt eius reprehenderit odio assumenda.</p>
                </div>
            </div>
            <div class="about-rules">
                <h1>Le règlément du club</h1>
                <ul>
                    <li>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, tenetur dolor! Ad tempore culpa, saepe incidunt obcaecati rem sed vel!</p>
                    </li>
                    <li>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, tenetur dolor! Ad tempore culpa, saepe incidunt obcaecati rem sed vel!</p>
                    </li>
                    <li>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, tenetur dolor! Ad tempore culpa, saepe incidunt obcaecati rem sed vel!</p>
                    </li>
                    <li>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, tenetur dolor! Ad tempore culpa, saepe incidunt obcaecati rem sed vel!</p>
                    </li>
                </ul>
            </div>
    </div>
</div>
@endsection
