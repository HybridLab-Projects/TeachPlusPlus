<template>
  <div>
    <b-sidebar
      id="sidebar-help"
      shadow
      backdrop
      title="Nápoveda"
      bg-variant="primary"
      text-variant="white"
    >
      <p class="mb-4 mt-5 px-3">
        Ak si sa rozhodol napísať feedback na konkrétneho učiteľa,
        prečítaj si prosím pravidlá a vzor.
      </p>
      <hr class="border-white">
      <ol class="mt-4">
        <li>Napíš, čo sa ti na hodine páči</li>
        <li>Navrhni, čo by sa mohlo na hodine zlepšiť</li>
        <li>Píš feedback v pozitívnom duchu</li>
        <li>Píš feedback s chladnou hlavou</li>
        <li>Nepoužívaj vulgarizmy a nevhodné slová</li>
      </ol>
      <p class="mt-5 font-weight-bold ml-2">
        Napríklad:
      </p>
      <p class="mt-4 px-3">
        Veľmi sa mi páči že som mohol po dokončení písomky odísť z triedy,
        ale keď vysvetľoval učivo, nezaujímal sa sa o to či tomu chápeme
        a iba pokračoval ďalej.
        Bol by som rád keby sa pred preberanim dalsieho uciva
        ratali priklady na utvrdenie vedomosti.
      </p>
    </b-sidebar>
  </div>
</template>

<script>
export default {
  name: 'FeedbackHelp',
};
</script>

<style lang="scss" scoped>

</style>
