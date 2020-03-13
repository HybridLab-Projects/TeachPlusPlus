<template>
  <b-container>
    <h1 class="text-center my-5">
      Čo je to Teach++
    </h1>
    <p>
      Loorem ipsum dolor sit amet, consectetur adipiscing elit.
      Phasellus non lectus erat.
      Pellentesque tempus lorem a diam finibus, ut consequat lorem aliquam.
      Nunc pretium tincidunt lacus, at consectetur ex.
      Sed feugiat mollis vehicula.
      Morbi euismod purus quis eleifend maximus.
      In libero lorem, lacinia a nibh ultricies, mattis commodo orci.
      Maecenas scelerisque mi in orci hendrerit, sit amet sodales urna tristique.
      Nam quam odio, venenatis id lacus at, tempor posuere ante.
    </p>
    <p>
      Loorem ipsum dolor sit amet, consectetur adipiscing elit.
      Phasellus non lectus erat.
      Pellentesque tempus lorem a diam finibus, ut consequat lorem aliquam.
      Nunc pretium tincidunt lacus, at consectetur ex.
      Sed feugiat mollis vehicula.
      Morbi euismod purus quis eleifend maximus.
      In libero lorem, lacinia a nibh ultricies, mattis commodo orci.
      Maecenas scelerisque mi in orci hendrerit, sit amet sodales urna tristique.
      Nam quam odio, venenatis id lacus at, tempor posuere ante.
    </p>
    <p>
      Loorem ipsum dolor sit amet, consectetur adipiscing elit.
      Phasellus non lectus erat.
      Pellentesque tempus lorem a diam finibus, ut consequat lorem aliquam.
      Nunc pretium tincidunt lacus, at consectetur ex.
      Sed feugiat mollis vehicula.
      Morbi euismod purus quis eleifend maximus.
      In libero lorem, lacinia a nibh ultricies, mattis commodo orci.
      Maecenas scelerisque mi in orci hendrerit, sit amet sodales urna tristique.
      Nam quam odio, venenatis id lacus at, tempor posuere ante.
    </p>
  </b-container>
</template>

<script>

import Axios from 'axios';

export default {
  name: 'StartingPage',
  created() {
    Axios.get('/api/teachers').then(({ data }) => {
      console.log(data);
    });
  },
};
</script>

<style lang="scss" scoped>
</style>
