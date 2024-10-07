@php
    $loggedInUser = Auth::user();
@endphp


<div class="column">   
    <div class="max-w-sm rounded overflow-hidden shadow-lg ">            
        <div class="user_card h-100">
            
            @foreach ($users as $user)

            <div class="font-bold text-xl  text-left ml-5 ">
                {{ $user->name }}
                

            </div>
                    
                <span>
                    <svg class="w-9 h-9" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <svg class="h-9 w-9 {{ $loggedInUser && $loggedInUser->id === $user->id ? 'text-green-500' : 'text-gray-500' }}" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            {{--  <svg class="h-9 w-9 {{ in_array($user->id, $loggedInUserIds) ? 'text-green-500' : 'text-gray-500' }}" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">  --}}


                        <g class="h-9 w-9 {{ $user->is_logged_in ? 'text-green-500' : 'text-gray-500' }}">
                            <path d="M7.824 5.937a1 1 0 0 0 .726-.312 2.042 2.042 0 0 1 2.835-.065 1 1 0 0 0 1.388-1.441 3.994 3.994 0 0 0-5.674.13 1 1 0 0 0 .725 1.688Z"></path>
                            <path d="M17 7A7 7 0 1 0 3 7a3 3 0 0 0-3 3v2a3 3 0 0 0 3 3h1a1 1 0 0 0 1-1V7a5 5 0 1 1 10 0v7.083A2.92 2.92 0 0 1 12.083 17H12a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h1a1.993 1.993 0 0 0 1.722-1h.361a4.92 4.92 0 0 0 4.824-4H17a3 3 0 0 0 3-3v-2a3 3 0 0 0-3-3Z"></path>
                            
                        </g>
                        
                        @if ($loggedInUser->id === $user->id) // && $user->language
                            <div class="mt-3">
                                {{--  @foreach ($user->languages as $language)
                                        <span class="bg-gray-200 text-gray-700 px-1 py-1 rounded mr-2">{{ $language->skill }}</span>
                                @endforeach  --}}

                                @foreach ($user->languages as $language)
                                    @if ($user->language === $language->skill) <!-- Check if this language is selected -->
                                        <span class="bg-gray-200 text-gray-700 px-1 py-1 rounded mr-2">{{ $language->skill }}</span>
                                    @endif
                                @endforeach
                            </div>


                            <div>
                                <p id="selectedCampaign">{{ Auth::user()->selected_campaign }}</p>

                            </div>


                            {{--  <div class="mt-3">
                                
                                <p>Selected Campaign: 
                                    {{ auth()->user()->campaign ? auth()->user()->campaign->name : 'No campaign selected' }}
                                </p>
                                
                            </div>  --}}

                            

                            
                        @endif

                    </svg>
                </span>

                <hr>
            @endforeach
        </div>

        
    </div>
</div>


{{--  
<div class="mt-2">
    @if(isset($skills[$user->id]))
        @foreach($skills[$user->id] as $skill)
            <span class="bg-gray-200 text-gray-700 px-2 py-1 rounded mr-2">{{ $skill }}</span>
        @endforeach
    @endif

</div>   --}}