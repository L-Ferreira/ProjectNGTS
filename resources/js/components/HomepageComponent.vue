<template>
  <v-container fluid>
    <v-card>
      <v-list-item three-line>
        <v-list-item-content>
          <v-card-title primary-title>Trash Can #X</v-card-title>
          <v-card-text>Capacity</v-card-text>
          <div v-if="capacity > 80">
            <v-progress-linear
              buffer-value="0"
              :value="capacity"
              height="20"
              striped
              color="red"
              stream
            >
              <template v-slot="{ value }">
                <strong>{{ capacity }}%</strong>
              </template>
            </v-progress-linear>
          </div>
          <div v-else-if="capacity > 40 && capacity < 80">
            <v-progress-linear
              buffer-value="0"
              :value="capacity"
              height="20"
              striped
              color="yellow"
              stream
            >
              <template v-slot="{ value }">
                <strong>{{ capacity }}%</strong>
              </template>
            </v-progress-linear>
          </div>
          <div v-else>
            <v-progress-linear
              buffer-value="0"
              :value="capacity"
              height="20"
              striped
              color="deep-orange"
              stream
            >
              <template v-slot="{ value }">
                <strong>{{ capacity }}%</strong>
              </template>
            </v-progress-linear>
          </div>

          <br />
          <v-card-actions centered>
            <v-card-text>
              Methane (CH4) level
              <v-col class="display-1">1880 ppb</v-col>
            </v-card-text>

            <v-card-text>
              Carbon Dioxide (CO2) level
              <v-col class="display-1">200 ppm</v-col>
            </v-card-text>

            <v-card-text>
              Temperature ºC
              <v-col class="display-1">{{temperature}}&deg;C</v-col>
            </v-card-text>

            <v-card-text>
              Relative Humidity (%)
              <v-col>
                <v-progress-circular
                  :rotate="-90"
                  :size="100"
                  :width="15"
                  :value="humidity"
                  color="primary"
                >{{ humidity }}</v-progress-circular>
              </v-col>
            </v-card-text>
          </v-card-actions>
        </v-list-item-content>
        <v-list-item-content>
          <GmapMap
            :center="{ lat: 39.734465, lng: -8.821045 }"
            :zoom="17"
            map-type-id="roadmap"
            style="full-width; height: 400px"
          >
            <GmapMarker
              :position="{ lat: 39.734465, lng: -8.821045 }"
              :clickable="true"
              :draggable="true"
              @click="center = { lat: 39.734465, lng: -8.821045 }"
            />
          </GmapMap>
        </v-list-item-content>
      </v-list-item>
    </v-card>
  </v-container>
</template>

<script>
export default {
  data() {
    return {
      temperature: 0,
      humidity: 0,
      capacity: 0
    };
  },
  methods: {
    registerTrashCan() {
      axios.get("api/trashcan/get/").then(response => {
        this.temperature = response.data.temperature;
        this.humidity = response.data.humidity;
        this.capacity = response.data.capacity;
      });
    }
  },
  created() {
    this.registerTrashCan();
  },
  mounted() {
    window.setInterval(() => {
      this.registerTrashCan();
    }, 3000);
  }
};
</script>
