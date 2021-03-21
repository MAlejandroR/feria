<template>
  <div class='h-15v bg-white md:bg-cabecera flex flex-row  p-2
border border-red-400 rounded  justify-content-around items-center '>
    <img class='hidden md:block p-2 max-h-full w-1/4'
         src="images/logos/enlaces_feria.png" alt='Logo Enlaces'/>

    <img class='display md:hidden object-center p-2 max-h-full max-w-full ml-10'
         src="images/logos/enlaces_feria_movil.png " alt="Logo Enlaces"/>

    <h1 class="hidden md:block text-7xl font-mono text-enlaces text-center
      max-h-full overflow-hidden place-self-right w-3/4">
      III Feria de Empleo 2021
    </h1>

    <slot></slot><!-- Para poder añadir un botón de volver-->
  </div>
</template>

<script>

export default {}

</script>
<style>


</style>

