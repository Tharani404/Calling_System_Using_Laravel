        <div class="skills">
        
            <div>Skills</div>
            <hr>
            <div class="switch1">
                
                <div class="mb-10%">
                    @foreach ($user->languages as $language)
                        <div>{{ $language->skill }}</div>
                    @endforeach

                </div>
               
                <div class="right-item">
                    @foreach ($user->languages as $language)
                        <label class="switch">
                            <input type="checkbox" 
                                   wire:click="toggleLanguage('{{ $language->skill }}')"
                                   @if($user->language === $language->skill) checked @endif>
                            <span class="slider round"></span>
                        </label>
                    @endforeach
                </div>
            </div>
        </div>