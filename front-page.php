  <?php
    get_header();
  ?>   
  <div class="flex flex-col md:flex-row font-ebgaramond justify-between cursor-default">
    <div class="flex ">
      <div class="h-screen min-w-40 text-9xl border-[40px] border-black bg-gradient-to-b from-slate-400 to-gray-100 text-black flex flex-col items-center justify-evenly font-bold leading-[0.8] p-2">
        <div class="border-b-2 border-black pb-6 w-[70%] text-center">
          L
        </div>
        <div class="border-b-2 border-black pb-6 w-[70%] text-center">
          M
        </div>
        <div class="border-b-2 border-black pb-6 w-[70%] text-center">
          L
        </div>
        <div>
          S
        </div>
        <div class="text-base font-normal italic -mb-2 font-montserrat transition-all p-2">
          the nature of things
        </div>
      </div>
    </div>
    <div aria-label="page links" class="h-[100dvh] min-w-[20dvw] border-[40px] border-black flex justify-center gap-4 text-white text-xl font-montserrat font-extrabold">
      <?php
        wp_nav_menu(
          array(
            'menu' => 'primary',
            'container' => '',
            'theme_location' => 'primary',
            'items_wrap' => '<ul id="mainlinks" class="mainlinks">%3$s</ul>'
          )
        );
      ?>
      <div class="bg-gradient-to-b from-slate-400 to-gray-100 h-[80%] w-1 self-center"></div>
      <?php
        wp_nav_menu(
          array(
            'menu' => 'secondary',
            'container' => '',
            'theme_location' => 'secondary',
            'items_wrap' => '<ul id="mainlinks" class="secondarylinks">%3$s</ul>'
          )
        );
      ?>
    </div>
    <div class="h-[100dvh] md:h-[100dvh] min-w-[20dvw] border-[40px] border-black flex justify-end items-center gap-4 text-white font-inter">
      <ul class="text-end text-slate-300">
        <li>editor</li>
        <li>fiction</li>
        <li>design</li>
      </ul>
      <div class="bg-gradient-to-b from-slate-400 to-gray-100 h-[20%] md:h-[25%] w-1"></div>
      <ul class="text-start whitespace-nowrap">
        <li>m h lopez</li>
        <li>gregg burdon</li>
        <li>buck ashburn</li>
        
      </ul>
    </div>
  </div>
  <?php
  get_footer();
  ?>