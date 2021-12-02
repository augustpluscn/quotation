<template>
  <div class="number">
    <van-field :required='required' v-model="val" type="number" :label="lavel" />
  </div>
</template>

<script>
export default {
  name: "Number",
  props: {
    required: {
      type: Boolean,
      default: false,
    },
    lavel: {
      type: String,
      default: "标题",
    },
    val: 0,
  },
  computed: {},
  methods: {},
};
</script>
