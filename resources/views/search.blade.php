@extends('corps')
       @section('title','Recherche')
        @section('content')

  
    
      
      
  <section style="height:auto;">
     <div class="parallax-container">
        
        <div class="row">
            <div class="col s12 pull-l2">
                
                <h2 class="center-align " style="margin-top: 100px; color:purple;font-size:40px;"> Trouver le service qui vous convient! </h2>
                
            </div>
            
                <div class="col s12 pull-l1">
                <div class="container" style="margin-top: 40px;">
             <form action="/search">
                <input  type="text" placeholder="Chercher un service" name="search" class="browser-default" style="width: 80%;padding: 15px;border: 1px solid black;font-size: 20px;border-radius: 5px 0 0 5px;" >
                <input type="submit" value="TROUVER" style="padding: 16px;border:none ;font-size: 20px;background-color: purple; color: white;border-radius: 0 5px 5px 0;cursor: pointer;position: absolute;">
                 
                     
                 
             </form>
                   
                   
                    </div>
                </div>
                
                <div class="col s12 pull-l3">
                    
                    <p class="center-align " style="margin-top: 10px;color:purple;"> Suggestions : Logo,Traduire un article...</p>
                </div>
                  </div>
            
        
         
         
         
         
         
         <div class="parallax">
             
             <img src="/img/search1.jpg" alt="" style="width: 50%; opacity: 0.6; ">
         </div>
     </div>
        
    </section>

   
        <section>

        <div class="row">
        <div class="col s12">
      <h4 class="center-align" style="font-size:25px;margin-top:40px;">Nous avons trouvé  <span class="purple-text">{{count($data)}}</span> resultat(s) associé(s) à <span class="purple-text">{{$search}}</span></h4>
        </div>
        </div>
        <br>
        <div class="row">
<div class="container">
@if(count($data)>0)
      @foreach($data as $service)
      <div class="col s4">

      <div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-image">
        <img src="/storage/serviceimage/{{$service->serviceimage}}" alt="" class="responsive-img circle" style="width:100%;">
         
        </div>
        <div class="card-content">
        <div class="row">
            <div class="col s12">
            <p class="center-align" style="font-size:14px;color:purple;">
            {{$service->titre}}
            </p>
            </div>
            </div>
        <div class="row">
        <div class="col s12">
        <p class="truncate" style="font-size:14px;">{{$service->description}}</p>
        </div>
        </div>
<br><br>
        <div class="row">
        <div class="col s12">
        <span style="color:purple;" > Catégorie : </span><span>{{$service->categorie->nom}}</span>
        </div>
        </div>

          <div class="row">
        <div class="col s12">
        <span style="color:purple;" > Livraison : </span><span>{{$service->periode}} Jours</span>
        </div>
        </div>
        <div class="row">
        <div class="col s12">
        <span  > Avis :  </span><span style="color:purple;">{{count($service->likes)}}</span>
        </div>
        </div>
           
        </div>
        <div class="card-action">
        <div class="row">
            <div class="col s6">
            <img src="/storage/image/{{$service->user->image}}" alt="" class="circle" style="width:100px;height:100px;">
            </div>

            <div class="col s6">
            @if ($service->user->id==Auth::user()->id)
            <a href="/profil"> par {{$service->user->username}}</a>
            @else
            <a href="/profil/{{$service->user->username}}"> par {{$service->user->username}}</a>
            @endif
            </div>
            </div>

            <div class="row">
            <div class="col s12">
            <a href="/Services/{{$service->id}}" class="btn-large purple hoverable waves-effect" style="margin-top:10px;">consulter</a>
            </div>
            </div>
        </div>
      </div>
    </div>
  </div>



       </div>
       @endforeach

    
</div>
     

    </div>


     @else
<br><br>
      <div class="col s12">
      <div class="card large z-depth-5">
      <div class="card-content center-align">

    <div class="row">
    <div class="col s12">
    <i style="font-size:200px;"class="material-icons">error</i>
            
    </div>
    <div class="row">
    <div class="col s12">
    <p style="font-size:40px;"> Aucun Service disponible</p>
    </div>
    </div>
    </div>
      
      </div>
      
      </div>
      </div>
        @endif

      





       


        </section>

       
        @endsection