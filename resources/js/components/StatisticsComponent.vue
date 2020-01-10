<template>
  <v-container fluid>
    <v-card>
      <v-container fluid>
        <v-row dense>
          <v-list-item four-line>
            <v-list-item-content>
              <v-card-text>
                <div>Statistics from the last 15 days</div>
                <p class="display-1 text--primary">Trash Can #X</p>
              </v-card-text>
              <v-col :cols="6">
                <div class="small">
                  <h4>Capacity</h4>
                  <line-chart :chart-data="datacollectionCapacity" :height="130"></line-chart>
                </div>
                <div class="small">
                  <h4>Temperature</h4>
                  <line-chart :chart-data="datacollectionTemperature" :height="130"></line-chart>
                </div>
              </v-col>
              <v-col :cols="6">
                <div class="small">
                  <h4>Humidity</h4>
                  <line-chart :chart-data="datacollectionHumidity" :height="130"></line-chart>
                </div>
                <div class="small">
                  <h4>Gas</h4>
                  <line-chart :chart-data="datacollectionGas" :height="130"></line-chart>
                </div>
              </v-col>
            </v-list-item-content>
          </v-list-item>
        </v-row>
      </v-container>
    </v-card>
  </v-container>
</template>

<script>
import LineChart from "./LineChart.js";

// var chartLabels = [];

// for (let index = 1; index < 11; index++) {
//   var date = new Date();
//   date.setDate(date.getHours() - index);
//   console.log(date.setDate(date.getHours() - index));
//   var finalDate =
//     ("0" + (date.getMonth() + 1)).slice(-2) +
//     "/" +
//     ("0" + date.getDate()).slice(-2);
//   chartLabels.push(finalDate);
// }

export default {
  components: {
    LineChart
  },
  data() {
    return {
      datacollectionCapacity: {},
      datacollectionTemperature: {},
      datacollectionHumidity: {},
      datacollectionGas: {},
      statistics: null,
      temperatureStats: [],
      humidityStats: [],
      capacityStats: [],
      statsDate: null,
      chartLabels: []
    };
  },
  methods: {
    registerStatistics() {
      axios.get("api/statistics/create").then(response => {
        console.log(response);
      });
    },
    getStatistics() {
      axios.get("api/statistics").then(response => {
        this.statistics = response.data;
        var i = 9;
        this.statistics.forEach(element => {
          this.statsDate = element.created_at
            .split("-")
            .join("/")
            .slice(5, element.created_at.length - 3);
          this.chartLabels.push(this.statsDate + "h");
          this.temperatureStats.push(element.temperature);
          this.humidityStats.push(element.humidity);
          this.capacityStats.push(element.capacity);
        });
        this.chartLabels.reverse();
        //Assign capacity values to chart
        this.datacollectionCapacity = {
          labels: this.chartLabels,
          datasets: [
            {
              label: "Capacity",
              backgroundColor: "#1C76C7",
              data: this.capacityStats
            }
          ]
        };

        //Assign gas values to chart
        this.datacollectionGas = {
          labels: this.chartLabels,
          datasets: [
            {
              label: "Gas",
              backgroundColor: "#1C76C7",
              data: [
                20,
                30,
                40,
                30,
                20,
                30,
                40,
                30,
                20,
                30,
                40,
                30,
                20,
                30,
                40,
                30,
                20
              ]
            }
          ]
        };

        //Assign temperature values to chart
        this.datacollectionTemperature = {
          labels: this.chartLabels,
          datasets: [
            {
              label: "Temperature",
              backgroundColor: "#1C76C7",
              data: this.temperatureStats
            }
          ]
        };

        //Assign humidity values to chart
        this.datacollectionHumidity = {
          labels: this.chartLabels,
          datasets: [
            {
              label: "Humidity",
              backgroundColor: "#1C76C7",
              data: this.humidityStats
            }
          ]
        };
      });
    }
  },
  mounted() {
    try {
      this.getStatistics();
    } catch (e) {
      console.log(e);
    }
    window.setInterval(() => {
      this.registerStatistics();
      this.getStatistics();
    }, 300000);
  }
};
</script>

<style lang="css">
.small {
  max-width: 800px;
  /* max-height: 500px; */
  margin: 50px auto;
}
</style>
