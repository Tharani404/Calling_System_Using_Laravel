<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        .ccard {
            margin-bottom: 10px;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: left;
            height: 190px;
            background-color: white;
            
        }
        
        .icon1{
            padding: 10px;
            font-size: 2rem;
            margin-bottom: 10px;
            height: 55px;
            width: 55px;
            border-radius: 10px;
            background-color: #d6dafd;
            color: rgb(98, 96, 240);
            
        }

        .icon2{
            padding: 10px;
            font-size: 2rem;
            margin-bottom: 10px;
            height: 55px;
            width: 55px;
            border-radius: 10px;
            background-color: rgb(198, 248, 195);
            color: rgb(18, 201, 9);
        }

        .icon3{
            padding: 10px;
            font-size: 2rem;
            margin-bottom: 10px;
            height: 55px;
            width: 55px;
            border-radius: 10px;
            background-color: rgb(247, 255, 198);
            color: rgb(245, 204, 19);
        }

        .icon4{
            padding: 10px;
            font-size: 2rem;
            margin-bottom: 10px;
            height: 55px;
            width: 55px;
            border-radius: 10px;
            background-color: rgb(250, 201, 201);
            color: rgb(201, 9, 9);
        }

        .container{
            display: flex;
            flex-direction: column;
            margin-bottom: 50px;
            width: 65%;
        }

        .row{
            display: flex;
            flex-direction: row;
            
        }

        .column{
            display: flex;
            flex-direction: column;
            margin-right: 10px;
        }

        .tcall{
            justify-content: left;
            flex: 2;
        }

        .skills{
            display: flex;
            flex-direction: column;
            width: 100%;
            justify-content: left;
        }

        .ongoing{
            width: 100%;
        }

        .switch1{
            display: flex;
            flex-direction:row;
            margin-bottom: 20px;
            
        }

        .right-item{
            margin-left:40%;
        }

        .user_card{
            margin: 10px;
            padding: 20px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            height: 140px;
            width: 100%;
        }

        .body_container{
            display: flex;
            flex-direction: row;
            margin-left: 10px;
        }

        .first_card{
            width: 30%;
            margin-left: 15px;
        }

        .user_container{
            width: 35%;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 28px;
            
          }
          
          .switch input { 
            opacity: 0;
            width: 0;
            height: 0;
          }
          
          .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
          }
          
          .slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        
          }
          
          input:checked + .slider {
            background-color: #2196F3;
          }
          
          input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
          }
          
          input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
          }
          
          /* Rounded sliders */
          .slider.round {
            border-radius: 30px;
          }
          
          .slider.round:before {
            border-radius: 50%;
          }

          .disabled {
            opacity: 0.5;
            pointer-events: none;
        }

        .blurred {
            opacity: 0.3;
        }

    </style>
</head>
<body>


    <script>
        let breakStartTime;
        let isOnBreak = false;
    
        function toggleBreak() {
            const breakButton = document.getElementById('breakButton');
            const totalBreakTime = document.getElementById('totalBreakTime');
            
            if (isOnBreak) {
                // End Break
                isOnBreak = false;
                breakButton.textContent = 'Start Break';
                breakButton.classList.remove('btn-danger');
                breakButton.classList.add('btn-primary');
    
                // Calculate break duration
                const breakEndTime = new Date();
                const breakDuration = (breakEndTime - breakStartTime) / 1000; // in seconds
                const minutes = Math.floor(breakDuration / 60);
                const seconds = Math.floor(breakDuration % 60);
                
                totalBreakTime.textContent = `${minutes} min ${seconds} sec`;
    
                // Unlock the page
                unlockPage();
            } else {
                // Start Break
                isOnBreak = true;
                breakButton.textContent = 'End Break';
                breakButton.classList.remove('btn-primary');
                breakButton.classList.add('btn-danger');
    
                // Set break start time
                breakStartTime = new Date();
    
                // Lock the page
                lockPage();
            }
        }
    
        function lockPage() {

            // Add the blurred class to blur the page
            document.body.classList.add('blurred');

            // Disable all interactive elements except the end break button
            document.querySelectorAll('#dashboard input, #dashboard button:not(#breakButton)').forEach(el => {
                el.disabled = true;
            });
        }
    
        function unlockPage() {

            // Add the blurred class to blur the page
            document.body.classList.remove('blurred');

            // Enable all interactive elements
            document.querySelectorAll('#dashboard input, #dashboard button').forEach(el => {
                el.disabled = false;
            });
        }
    </script>
    
    
    
    <div id="dashboard">
    <x-app-layout>
        <x-slot name="header">

            <div class="flex justify-between items-center">
                <h1 class="text-xl font-semibold text-gray-800" style="color: rgb(103, 101, 101)">Dashboard</h1>
                
                    <a href="#" id="breakButton" onclick="toggleBreak()" class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 btn-secondary float-right">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M10 3h3v1h-1v9l-1 1H4l-1-1V4H2V3h3V2a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v1zM9 2H6v1h3V2zM4 13h7V4H4v9zm2-8H5v7h1V5zm1 0h1v7H7V5zm2 0h1v7H9V5z"></path></svg>
                        Start Break
                    </a>
                
            </div>
            
        </x-slot>

         
        <br><br>


        <div class="row justify-content-end">
            <div class="col-md-2" style="margin-top: px; margin-right: 20px;">
                <div class="mb-3" width="48" >
                    {{--  <label for="">Campaigns</label>  --}}
                    <select name="campeign" class="form-control btn" style="font-weight: bold; background-color: rgb(196, 198, 198); color: rgb(0, 0, 0); border-color: rgb(195, 195, 199);">
                        <option value="">Select Campaign </option>
                        
                        @foreach($campeign as $campeign)
                            <option value="{{ $campeign->id }}">{{ $campeign->name }}</option>
                        @endforeach

                        
                    </select>
                    
                </div>
            </div>
            
        </div>


        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const campaignSelect = document.querySelector('select[name="campeign"]');
                const selectedCampaignDisplay = document.getElementById('selectedCampaign');
                
                campaignSelect.addEventListener('change', function () {
                    const selectedOption = campaignSelect.options[campaignSelect.selectedIndex].text;
                    selectedCampaignDisplay.textContent = selectedOption; // Update the campaign display
                    
                    // Optionally, submit the form here to update in the backend
                    this.form.submit();
                });
            });
        </script>
        

    
        <div class="body_container">

            <div class="container">
                <div class="row">
                    <div class=" first_card">
                        <div class="ccard">
                            
                            <div class="tcall"> 
                                <h5>Total Calls</h5> 
                                <h4>0</h4>
                            </div>

                            <div>
                                {{--  <i class="bi bi-telephone-fill icon1"></i>      --}}
                                <span>
                                    <svg class=" icon1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M0 0h24v24H0z" fill="none"></path><path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56-.35-.12-.74-.03-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"></path></svg>
                                </span>
                            </div>
                            
                        </div>
                    </div>

                    <div class="first_card">
                        <div class="ccard ">

                            <div class="tcall"> 
                                <h5>Additional</h5> 
                                <h4>0</h4>
                            </div>

                            <div>
                                {{--  <i class="bi bi-telephone-plus-fill icon2"></i>  --}}
                                <svg class="icon2" viewBox="0 0 24 24"><path fill="currentColor" d="m15.556 14.548l-.455.48s-1.083 1.139-4.038-1.972c-2.955-3.111-1.872-4.25-1.872-4.25l.287-.303c.706-.744.773-1.938.156-2.81L8.374 3.91C7.61 2.83 6.135 2.688 5.26 3.609L3.691 5.26c-.433.457-.723 1.048-.688 1.705c.09 1.68.808 5.293 4.812 9.51c4.247 4.47 8.232 4.648 9.861 4.487c.516-.05.964-.329 1.325-.709l1.42-1.496c.96-1.01.69-2.74-.538-3.446l-1.91-1.1c-.806-.463-1.787-.327-2.417.336M13.26 1.88a.751.751 0 0 1 .861-.62c.025.005.107.02.15.03c.085.018.204.048.352.09c.297.087.712.23 1.21.458c.996.457 2.321 1.256 3.697 2.631c1.376 1.376 2.175 2.702 2.632 3.698c.228.498.37.912.457 1.21a5.727 5.727 0 0 1 .113.454l.005.031a.765.765 0 0 1-.617.878a.75.75 0 0 1-.86-.617a2.82 2.82 0 0 0-.081-.327a7.395 7.395 0 0 0-.38-1.004c-.39-.85-1.092-2.024-2.33-3.262c-1.237-1.238-2.411-1.939-3.262-2.329a7.394 7.394 0 0 0-1.003-.38a5.749 5.749 0 0 0-.318-.08a.759.759 0 0 1-.626-.861"></path><path fill="currentColor" fill-rule="evenodd" d="M13.486 5.33a.75.75 0 0 1 .927-.516l-.206.721l.206-.72h.003l.003.001l.008.002l.02.006l.056.02a5.028 5.028 0 0 1 .767.373c.489.29 1.157.77 1.942 1.556c.785.785 1.266 1.453 1.556 1.942c.145.245.241.444.303.59a2.969 2.969 0 0 1 .09.233l.005.02l.003.008v.003l.001.001s0 .002-.72.208l.72-.206a.75.75 0 0 1-1.439.422l-.003-.01a3.67 3.67 0 0 0-.25-.504c-.224-.377-.627-.947-1.327-1.647c-.7-.7-1.269-1.102-1.646-1.325a3.662 3.662 0 0 0-.504-.25l-.01-.004a.75.75 0 0 1-.505-.925" clip-rule="evenodd"></path></svg>
                            </div>
                        </div>
                    </div>


                    <div class="first_card">
                        <div class="ccard">

                            <div class="tcall"> 
                                <h5>Total Break</h5> 
                                <h4 id="totalBreakTime">--</h4>
                            </div>

                            <div>
                                {{--  <i class="bi bi-cup-hot-fill icon3"></i> --}}

                                <svg class="icon3" viewBox="0 0 24 24"><path fill="currentColor" fill-rule="evenodd" d="M10.53 1.47a.75.75 0 0 1 0 1.06c-.26.26-.26.68 0 .94a2.164 2.164 0 0 1 0 3.06a.75.75 0 0 1-1.06-1.06a.666.666 0 0 0 0-.94a2.164 2.164 0 0 1 0-3.06a.75.75 0 0 1 1.06 0m-4.5 1.5a.75.75 0 0 1 0 1.06l-.116.116a.691.691 0 0 0-.064.904a2.191 2.191 0 0 1-.204 2.864l-.116.116a.75.75 0 0 1-1.06-1.06l.116-.116a.691.691 0 0 0 .064-.904a2.191 2.191 0 0 1 .203-2.864l.116-.116a.75.75 0 0 1 1.061 0m9.5 0a.75.75 0 0 1 0 1.06l-.116.116a.691.691 0 0 0-.064.904a2.191 2.191 0 0 1-.204 2.864l-.116.116a.75.75 0 1 1-1.06-1.06l.116-.116a.691.691 0 0 0 .064-.904a2.191 2.191 0 0 1 .203-2.864l.117-.116a.75.75 0 0 1 1.06 0M4.647 9.25h10.705c.363 0 .641 0 .882.042a2.746 2.746 0 0 1 1.64.958H19a3.75 3.75 0 1 1 0 7.5h-1.352a6.265 6.265 0 0 1-5.841 4H8.193a6.265 6.265 0 0 1-6.222-5.537l-.4-3.428l-.009-.068c-.042-.36-.074-.637-.06-.88a2.75 2.75 0 0 1 2.264-2.545c.24-.042.519-.042.881-.042m11.821 7.221a.748.748 0 0 0-.201.69a4.764 4.764 0 0 1-4.46 3.089H8.193a4.765 4.765 0 0 1-4.732-4.211l-.4-3.428c-.055-.46-.067-.592-.062-.686a1.25 1.25 0 0 1 1.03-1.156c.091-.016.223-.019.687-.019h10.568c.463 0 .595.003.687.02c.57.1.995.579 1.03 1.156c.005.093-.008.224-.061.685l-.401 3.428c-.017.145-.04.29-.07.432m1.556-.221H19a2.25 2.25 0 0 0 0-4.5h-.509c.003.029.005.057.006.086c.015.244-.017.52-.06.88l-.008.069l-.4 3.428z" clip-rule="evenodd"></path></svg>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="first_card">
                        <div class="ccard">

                            <div class="tcall"> 
                                <h5>Messages</h5> 
                                <h4>0</h4>
                            </div>

                            <div>
                                <svg class="icon4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M0 0h24v24H0z" fill="none"></path><path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z"></path></svg>
                            </div>
                        </div>
                    </div>

                    <div class="first_card">
                        <div class="ccard ">
                            @can('skill')
                            <livewire:user-skills />
                            
                            @endcan

                            @can('skillLabel')
                            <label for="" class="center">N/A</label>
                            @endcan
                            

                        </div>
                    </div>


                    <div class="first_card">
                        <div class="ccard">
                            
                            <div class="ongoing">
                                <div>Ongoing Queue Count</div>
                                <hr>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="user_container">
                <div class="column">
                    

                    <livewire:agent />

                    
                </div>
            </div>
        </div>
    
    </x-app-layout>
</div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>