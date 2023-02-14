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
    <h1>Register your Car</h1>
    <div class='container  w-80'>
        <div class='row'>
            <div class='lg-col-5'>
                <form action='/car/user' method='post'> 
                @csrf
                    <h2>User</h2>
                    <label for="nombre">Name:</label><br>
                    <input class="lightRounded" type="text" id='name' name="name" placeholder="Name here" ><br>
                    <label for="apellido">Last Name:</label><br>
                    <input class="lightRounded" type="text" id='lastName' name="lastName" placeholder="Last Name here"><br>
                    <label for="email">Email:</label><br>
                    <input class="lightRounded" type="email" id='email'name="email" placeholder="Email here"><br>
                    <hr>
                    <h2>Car</h2>
                    <label for="plate">Plate:</label><br>
                    <input class="lightRounded" type="text" name="plate" placeholder="Plate here" required><br>
                    <label for="brand">Brand:</label><br>
                    <input class="lightRounded" type="text" name="brand" placeholder="Brand here"><br>
                    <label for="model">Model:</label><br>
                    <input class="lightRounded" type="text" name="model" placeholder="Model here"><br>
                    <hr>
                    <label for='user'>Chose a <span id='newUser'>New User</span> or  <span id='existing'>Select an Existing One</span></label>
                    <select name="user" id='user' class="lightRounded form-select mt-2" >
                        <option  value = '0'>No user</option>
                        @foreach ($users as $user )
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                    <input type="submit" class = 'greyBlueBtn' value="+ Add Car"> 
                    @if (session('message'))
                        <div class='alert alert-success'>{{ session('message') }}</div>
                    @endif
                </form>
            </div>
            <div class = 'lg-col-7'>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">LastName</th>
                        <th scope="col">email</th>
                        <th scope="col">Car </th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($users as $user)
                   <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->lastName }}</td>
                    <td>{{ $user->email }}</td>
                    <td>@if(!empty($user->cars))
                        <ul>
                            @foreach ( $user->cars as $car )
                            <li>Brand: {{$car->brand}} Model: {{$car->model}} Plate: {{ $car->plate}}</li>
                            @endforeach
                        </ul>    
                    </td>
                   </tr>
                   @endforeach
                </tbody>
                </table>
            </div>
        </div>
       
</div>
@endsection