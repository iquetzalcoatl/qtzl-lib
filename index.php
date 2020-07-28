<?php 

require_once 'main.inc.php';
include_once ENGINE;
$engine = new engine();
$engine->load('Qtzl-lib');
$engine->render();
$navbar = new navbar();
echo $navbar->manualnavbar(NULL);

?>
<section class="hero is-primary">
  <div class="hero-body">
    <p class="title">
      Documentation
    </p>
    <p class="subtitle">
      Everything you need to <strong>create a website</strong> with Bulma
    </p>
  </div>
</section>