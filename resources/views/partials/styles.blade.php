<style>
	.background{
    background-image: url('{{ asset('img/background.jpg') }}');
    background-size: cover;
    background-attachment: fixed; 
    min-height: 50vh;
  }
  .overlay{
    background-color: rgba(0,0,0,0.5);
    min-height: 100vh;
  }
</style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stack('styles')