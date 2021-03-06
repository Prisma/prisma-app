@extends ('layout')

@section ('content')

@include('residents/_header')

<div id="app">
  <gallery
  :images="gallery" 
  :index="index"
  :options="{youTubePlayerVars: { showinfo: 0, rel: 0, autoplay: 1, modestbranding: 1 }, youTubeClickToPlay: false}"
  @close="index = null">
</gallery>
</div>

<div 
v-cloak
class="container">

<div class="story-container">

  {{-- Add stories --}}
  @include('residents/_storyadd')

  {{-- Edit stories --}}
  @include('residents/_storyedit')

  <a 
  href="{{ route('residents.storycreate') }}" 
  id="addStoryBtn"
  class="btn btn-primary btn-sm d-flex justify-content-center align-items-center mb-1 d-print-none">
  Verhaal toevoegen
</a>



{{-- Album overview --}}

<div 
v-for="(albumstories, album) in albums" 
v-if="stories.length>0">

{{-- Stories --}}

<div 
class="story-category" 
:id="album">

<div class="story-category-header">
  <h2>@{{ album }} </h2>
</div>

<div class="row">
  <div 
  v-for="story in albumstories" 
  class="story col-md-6 col-lg-4 d-print-none" 
  v-bind:class="{checked: checkedStories.includes(story.id), 'd-print-block': checkedStories.includes(story.id)}">

  @include('residents/_story')

</div>
</div>
</div>

</div>

{{-- Content when no stories yet --}}

<div 
v-if="stories.length==0"
v-cloak
class="d-none text-center d-print-none row">

<div class="col-md-8 col-lg-7 mx-auto">

  <img src="/img/illustration/happyresident.png" alt="" class="img-fluid px-5">

  <p class="lead lead-lg">Waar babbelt Lea graag over?</p>
  <p>Help het Sint Monika team om Lea te leren kennen aan de hand van verhalen over haar leven. Voeg foto's en video's toe die het personeel kunnen inspireren om een babbeltje te slaan.</p>

  <p>
    <a href="{{ route('residents.storycreate') }}" 
    class="btn btn-primary mb-1 d-print-none mx-auto" >
    Verhaal toevoegen
  </a>
</p>
<hr>
<p class="lead lead-sm">
  Weet je niet goed hoe je foto's kan toevoegen? Lees de <a href="https://prisma.care/helppagina/">tips om te starten</a> met Prisma of roep de hulp in van een familielid. 
  
</p> 

<a class="btn btn-light" href="{{ route('residents.family') }}">Nodig familie uit</a>


{{--         <a href="https://prisma.care/levensverhaal-posters/"><img src="https://prisma.care/wp-content/uploads/2018/05/prisma-poster-maken-pelgrims.jpg" alt="Poster maken" class="img-thumbnail"></a> --}}

{{-- <a href="https://prisma.care/levensverhaal-posters/">Hoe maak je een poster?</a> --}}
{{-- 
<hr class="mt-4">
<img src="/img/illustration/collectfamily.png" alt="" class="img-fluid px-5">
<h2 class="mb-3">Hulp van je familie</h2>
<p>Wie heeft er nog foto's van Irma, en kan de verhalen aanvullen? </p>
<p><a class="btn btn-light" href="{{ route('residents.family') }}">Nodig familie uit</a></p> --}}


</div>
</div>    


</div>


{{-- Story actions --}}

<div
class="story-actions fixed-bottom d-print-none" 
v-if="checkedStories.length > 0 || showStoryActions == true">

<div class="container d-flex text-muted">

  <div class="mr-auto d-flex align-items-center">
    <input type="checkbox" id="selectAllCheckbox" v-model="selectAll" class="mr-1"> 
    <span v-if="checkedStories.length == 0">
      Selecteer de verhalen die je wilt printen
    </span>
    <span v-if="checkedStories.length > 0">
      <span class="badge badge-pill badge-primary">@{{ checkedStories.length }}</span> geselecteerd
    </span>
  </div>

  <a href="javascript:window.print()" class="btn btn-sm btn-primary d-flex align-items-center" :disabled="checkedStories.length > 0"><i class="material-icons mr-2">print</i> Print</a>

</div>
</div>

</div>

</div>

@endsection

@section ('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.2/axios.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/blueimp-gallery@2.27.0/js/blueimp-helper.js"></script> 
<script type="text/javascript" src="https://unpkg.com/blueimp-gallery@2.27.0/js/blueimp-gallery.js"></script> 
<script type="text/javascript" src="https://unpkg.com/blueimp-gallery@2.27.0/js/blueimp-gallery-fullscreen.js"></script> 
<script type="text/javascript" src="https://unpkg.com/vue-gallery"></script>
<script type="text/javascript" src="https://unpkg.com/blueimp-gallery@2.27.0/js/blueimp-gallery-youtube.js"></script>
<script type="text/javascript" src="https://unpkg.com/blueimp-gallery@2.27.0/js/blueimp-gallery-video.js"></script>
<script type="text/javascript" src="/js/stories.js"></script>
@endsection