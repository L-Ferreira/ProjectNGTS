<template>
  <v-container fluid>
    <v-card>
      <v-container fluid>
        <v-row dense>
          <v-list-item four-line>
            <v-list-item-content>
              <v-card-text>
                <div>Statistics from the last 10 days</div>
                <p class="display-1 text--primary">Trash Can #X</p>
                <div class="text--primary">All the values are collected at 11pm</div>
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

var chartLabels = [];

for (let index = 1; index < 11; index++) {
  var date = new Date();
  date.setDate(date.getDate() - index);
  var finalDate =
    ("0" + (date.getMonth() + 1)).slice(-2) +
    "/" +
    ("0" + date.getDate()).slice(-2);
  chartLabels.push(finalDate);
}

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
      statsDate: null
    };
  },
  methods: {
    getStatistics() {
      axios.get("api/statistics").then(response => {
        this.statistics = response.data;
        var i = 9;
        this.statistics.forEach(element => {
          this.statsDate = element.created_at
            .split("-")
            .join("/")
            .slice(5, element.created_at.length - 9);
          if (this.statsDate == chartLabels[i]) {
            this.temperatureStats.push(element.temperature);
            this.humidityStats.push(element.humidity);
            this.capacityStats.push(element.capacity);
            i = i - 1;
          }
        });

        //Assign capacity values to chart
        this.datacollectionCapacity = {
          labels: [
            chartLabels[9],
            chartLabels[8],
            chartLabels[7],
            chartLabels[6],
            chartLabels[5],
            chartLabels[4],
            chartLabels[3],
            chartLabels[2],
            chartLabels[1],
            chartLabels[0]
          ],
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
          labels: [
            chartLabels[9],
            chartLabels[8],
            chartLabels[7],
            chartLabels[6],
            chartLabels[5],
            chartLabels[4],
            chartLabels[3],
            chartLabels[2],
            chartLabels[1],
            chartLabels[0]
          ],
          datasets: [
            {
              label: "Gas",
              backgroundColor: "#1C76C7",
              data: [20, 40, 50, 20, 50, 40]
            }
          ]
        };

        //Assign temperature values to chart
        this.datacollectionTemperature = {
          labels: [
            chartLabels[9],
            chartLabels[8],
            chartLabels[7],
            chartLabels[6],
            chartLabels[5],
            chartLabels[4],
            chartLabels[3],
            chartLabels[2],
            chartLabels[1],
            chartLabels[0]
          ],
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
          labels: [
            chartLabels[9],
            chartLabels[8],
            chartLabels[7],
            chartLabels[6],
            chartLabels[5],
            chartLabels[4],
            chartLabels[3],
            chartLabels[2],
            chartLabels[1],
            chartLabels[0]
          ],
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
