@if ($errors->any())

 <div {{ $attributes }} class="bg-white  sm:rounded-lg">
        <div  class="alert alert-danger" role="alert">
                    <h4 class="alert-heading"> 
          
                      {{ __('Whoops! Parece que algo salio mal.') }}
                    !</h4>
                         <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                              
                </div>
          
@endif