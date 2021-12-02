<template>
  <div class="number">
    <van-icon name="plus" />
    <van-field :required='required' :value="val" type="number" :label="label" @input="valChange" />
    <van-icon name="minus" />
  </div>
</template>

<script>
export default {
  name: "Number",
  props: {
    id: {
      type: String,
    },
    required: {
      type: Boolean,
      default: false,
    },
    label: {
      type: String,
      default: "标题",
    },
    val: {
      type: [Number, String],
      default: "",
    },
  },
  computed: {},
  methods: {
    valChange(val) {
      this.$emit("valChange", this.id, val);
    },
  },
};
</script>
