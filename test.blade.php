
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>trainer's website</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href={{asset("trainer/css/all.css")}}>



    <!-- Custom Style   -->
    <link rel="stylesheet" href={{asset("trainer/css/Style.css")}}>
    <link rel="stylesheet" href={{asset("css/main.css")}}>


</head>

<body>

    <!-- ----------------------------  Navigation ---------------------------------------------- -->

    <nav class="nav">
        <div class="nav-menu flex-row">
            <div class="nav-brand">
                <a href="#" style="color:#006400;">MY TRAINER’S WEBSITE</a>
            </div>
            <div class="toggle-collapse">
                <div class="toggle-icons">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
            <div>
                <ul class="nav-items" >
                    <li class="nav-link">
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-link">
                        <a href="{{route('about-trainer')}}">About</a>
                    </li>
                    
                    <li class="nav-link">
                        <a href="{{ url('trainee/proTrainee/package')}}">Package</a>
                    </li>

                </ul>
            </div>
            <div class="section">
            <a href="{{url('profileTrainee')}}" type="submit" class="styleA" >Back</a>

            @guest
                                       
                                   
                         <a  href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();" class="styleA">  <i class="ti-power-off"></i>
                                    <span>  {{ __('Log Out') }}</span>
                                            
                                 </a>

                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                     @csrf
                                 </form>
                           
                         
 
                                 @endguest

      
   </div>
        </div>
    </nav>

    <!-- ------------x---------------  Navigation --------------------------x------------------- -->

    <!----------------------------- Main Site Section ------------------------------>
    <main>
    <section>
            <div class="blog" >
                @if(Session::get("nextq")==1)
            <p style="color:#006400; font-size:30px; text-align:center;">Start Test</p>
            @else
            <p style="color:#006400; font-size:30px; text-align:center;">Test In Progress</p>
            @endif
              <div class="container-card">
                    <div class="card-container">
                        <form method="post" action="{{route('nextquestion' , ['id' => Auth::guard('trainee')->user()->id])}}">
                                @csrf
                        <div class="card"    style="margin-left:600px;" >
                            <div class="card-content">
                            <img src="{{asset('uploads/images/question/'.$question->image)}}" width="100px" height="100px" alt="Image"> 
                                <p class="card-info">#{{Session::get("nextq")}}  :  {{($question ->question)}}</p>
                                    <input type="radio" name="ans" value="a">
                                    <label for="">(A): {{($question ->a)}}</label><br>
                                    <input type="radio"  name="ans" value="b">
                                    <label for="">(B): {{($question ->b)}}</label><br>
                                    <input type="radio"  name="ans" value="c">
                                    <label for="">(C): {{($question ->c)}}</label> <br>
                                    <input type="radio"  name="ans" value="d">
                                    <label for="">(D): {{($question ->d)}}</label>
                                    <input style="display:none;"  name="dbans" value="{{($question ->ans)}}">

                         </div>
                        </div>
           

                        </div>
                            <button class="btn" type="submit" style="cursor:pointer;float:right; margin-top:-90px; margin-right:130px;" >next</button> 
                        
                        </form>
                   
                
             </div>
            </div>
        </section>

 
    </main>

 

                   
                    
        

    <!-- -------------x------------- Footer --------------------x------------------- -->



    <!-- ------------ AOS js Library  ------------------------- -->
    <script src={{asset("trainer/js/aos.js")}}></script>

    <!-- Custom Javascript file -->
    <script src={{asset("trainer/js/main.js")}}></script>
</body>

</html>
