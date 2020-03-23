<template>
  <div>
    <b-row class="mt-3">
      <b-col class="d-flex justify-content-end align-items-center">
        <p class="pr-5 my-auto text-secondary">
          Odhlasemie z aplikacie
        </p>
        <b-button
          variant="danger"
          class="py-3 px-4"
        >
          Pridat feedback
        </b-button>
      </b-col>
    </b-row>
    <b-row class="mt-5">
      <b-col class="d-flex align-items-center">
        <img
          class="mb-4"
          :src="require(`@/assets/img/teacher.png`)"
          alt=""
        >
        <div class="my-auto">
          <h6 class="text-secondary">
            <strong>SPŠE HALOVA</strong>
          </h6>
          <h1>Emilia Jancuskova</h1>
          <p class="text-secodnary">
            Predmety
          </p>
        </div>
      </b-col>
    </b-row>
    <b-row class="mt-5">
      <b-col>
        <b-tabs
          content-class="mt-3"
        >
          <b-tab
            title="Najnovšie feedbacky"
            active
          >
            <b-badge
              variant="warning"
            >
              Warning
            </b-badge>
          </b-tab>
          <b-tab title="Zoradiť podľa počtu hlasov">
            <b-badge variant="danger">
              Danger
            </b-badge>
          </b-tab>
        </b-tabs>
      </b-col>
    </b-row>
  </div>
</template>

<script>
export default {
  name: 'Teacher',
};
</script>

<style lang="scss" scoped>

</style>
