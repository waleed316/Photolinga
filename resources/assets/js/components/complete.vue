<template>
  <div>
    <autocomplete
      url="https://maps.googleapis.com/maps/api/place/autocomplete/json?input="
      anchor="formatted_address"
      label="geometry.location.lat"
      name="autocomplete"
      :customParams="{ key:'AIzaSyDup0HaTwlqPCzO0e549NTKfWDloKUtjwA'}"
      :classes="{ input: 'form-control', wrapper: 'input-wrapper'}"
      :process="processJSON"
      :onSelect="handleSelect"
    >
    </autocomplete>

    <pre v-if="preContent" :style="preStyle">
      <b>Selected Data:</b>
      {{ preContent }}
    </pre>
  </div>
</template>

<script>
  import Autocomplete from 'vue2-autocomplete-js';
  export default {
    components: { Autocomplete },
    data () {
      return  {
        preContent: "",
        preStyle: {
          background: "#f2f2f2",
          fontFamily: "monospace",
          fontSize: "1em",
          display: "inline-block",
          padding: "15px 7px",
        }
      }
    },
    methods: {
      processJSON(json) {
        return json.results;
      },
      handleSelect(data) {
        this.preContent = JSON.stringify(data, null, 4)
      },
      process (Function){
        
      }
    }
  };
</script>