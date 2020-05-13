<template>
  <div>
    <div class="d-flex">
      <b-button
        v-b-toggle.sidebar-help
      >
        <b-icon-list />
      </b-button>
      <p class="my-auto ml-2 d-none d-sm-block text-muted font-weight-bold">
        Zobraziť nápovedu
      </p>
    </div>
    <b-sidebar
      id="sidebar-help"
      shadow
      backdrop
      title="Nápoveda"
      bg-variant="primary"
      text-variant="white"
    >
      <p class="mb-5 mt-5 px-3">
        Ak si sa rozhodol napísať feedback na konkrétneho učiteľa,
        v kľude sa môžeš inšpirovať touto šablónou.
      </p>
      <hr class="border-white">
      <p class="mt-5 px-3">
        Milý pán učiteľ/Milá pani učiteľka,<br><br>
        Na dnešnej hodine sa mi páčilo že ..., no mohli by sme/ste ...
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
