<template>
  <b-list-group-item
    class="d-flex flex-column align-items-end mb-4 border-0 shadow"
  >
    <div
      class="d-flex align-items-center w-100"
    >
      <b-avatar
        class="mr-4"
        :src="`https://avatars.dicebear.com/v2/avataaars/${feedback.author.email}.svg?options[mood][]=happy`"
        variant="light"
        size="lg"
      />
      <div class="p-2 mr-auto">
        <div class="text-break">
          <p class="text-secondary mb-1 font-weight-light time">
            {{ toTime(feedback.created_at) }} -
            {{ feedback.subject.subject_name }}
          </p>
          <h6 class="font-weight-bold">
            {{ feedback.author.username }}
          </h6>
          <div>
            {{ feedback.feedback }}
          </div>
        </div>
      </div>
      <p class="font-weight-bold my-0 pr-2 pl-5">
        {{ feedback.likes.length }}
      </p>
      <b-link @click="likeFeedback(feedback)">
        <b-icon-heart
          variant="danger"
          v-if="!feedback.likes.some((like) => +like.user.id === user.id)"
        />
        <b-icon-heart-fill
          variant="danger"
          v-else
        />
      </b-link>
    </div>
    <div
      class="d-flex"
    >
      <b-avatar
        v-for="like in feedback.likes"
        :key="like.id"
        class="ml-1"
        :src="`https://avatars.dicebear.com/v2/avataaars/${like.user.email}.svg?options[mood][]=happy`"
        variant="light"
        v-b-tooltip:tooltip="`${like.user.name} ${like.user.surname}`"
      />
    </div>
    <div class="mt-2">
      <b-link
        v-if="!feedback.reports.some((report) => +report.user_id === user.id)"
        @click="reportFeedback(feedback)"
        class="text-muted"
      >
        <b-icon-exclamation-octagon />
        Nahlásiť nevhodný feedback
      </b-link>
      <p
        v-else
        class="text-muted mb-0"
      >
        Ďakujeme za nahlásenie.
      </p>
    </div>
  </b-list-group-item>
</template>

<script>
import Moment from 'moment';

export default {
  name: 'FeedbackItem',
  props: {
    feedback: {
      type: Object,
      required: true,
    },
    user: {
      type: Object,
      required: true,
    },
  },
  methods: {
    likeFeedback(feedback) {
      this.$store.dispatch('like', feedback);
    },
    reportFeedback(feedback) {
      this.$store.dispatch('report', feedback);
    },
    toTime(time) {
      Moment.locale('sk');
      return Moment(Moment.utc(time)).local().format('DD. MMMM YYYY, H:mm');
    },
  },
};
</script>

<style lang="scss" scoped>
.time {
  font-size: 0.75em;
}
.text-report {
  font-size: 0.875rem;
}
</style>
