@extends('main')
@section('content')
 <script>
            window.onload = init;
            function init(){
                var select = document.getElementById('user');
                select.addEventListener('change',usersOff);
            }

            function usersOff(){

                var name = document.getElementById('name');
                var lastName = document.getElementById('lastName');
                var email = document.getElementById('email');
                var select = document.getElementById('user');
                

                var newUser = document.getElementById('newUser');
                var existing = document.getElementById('existing');
                if(user.options[event.target.selectedIndex].value!=0){
                    name.disabled=true;
                    lastName.disabled=true;
                    email.disabled=true;
                    console.log('desactivado');
                    existing.style.color='orange';
                    existing.style.fontWeight='bold';

                    newUser.style.color='white';
                    newUser.style.fontWeight='normal';
                    
                }else{
                    name.disabled=false;
                    lastName.disabled=false;
                    email.disabled=false;
                    console.log('activado');

                    newUser.style.color='orange';
                    newUser.style.fontWeight='bold';

                    existing.style.color='white';
                    existing.style.fontWeight='normal';
                


                }
            }
        </script>
    <div class='container  w-80'>
    <h1>New Car</h1>
        <form action='/car' method='post'> 
        @csrf
            <label for="plate">Plate:</label><br>
            <input class="lightRounded" type="text" name="plate" placeholder="Plate here" required><br>
            <label for="brand">Brand:</label><br>
            <input class="lightRounded" type="text" name="brand" placeholder="Brand here"><br>
            <label for="model">Model:</label><br>
            <input class="lightRounded" type="text" name="model" placeholder="Model here"><br>
     
            <input type="submit" class = 'greyBlueBtn' value="+ Add Car"> 
            @if (session('message'))
                <div class='alert alert-success'>{{ session('message') }}</div>
            @endif
        </form>
</div>
@endsection