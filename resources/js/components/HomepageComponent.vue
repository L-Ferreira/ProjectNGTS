<template>
  <v-container fluid>
    <v-card>
      <v-card-title primary-title>Trash Can #X</v-card-title>
      <v-card-text>Capacity</v-card-text>
      <v-progress-linear buffer-value="0" value="60" height="20" striped color="deep-orange" stream>
        <template v-slot="{ value }">
          <strong>{{ Math.ceil(value) }}%</strong>
        </template>
      </v-progress-linear>
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
          <v-col class="display-1">23&deg;C</v-col>
        </v-card-text>

        <v-card-text>
          Relative Humidity (%)
          <v-col>
            <v-progress-circular
              :rotate="-90"
              :size="100"
              :width="15"
              :value="69"
              color="primary"
            >{{ 69 }}</v-progress-circular>
          </v-col>
        </v-card-text>
      </v-card-actions>
    </v-card>
    <GmapMap
      :center="{lat:39.734465, lng:-8.821045}"
      :zoom="17"
      map-type-id="terrain"
      style="full-width; height: 400px"
    >
      <GmapMarker
        :position="{lat:39.734465, lng:-8.821045}"
        :clickable="true"
        :draggable="true"
        @click="center={lat:39.734465, lng:-8.821045}"
      />
    </GmapMap>
  </v-container>
</template>


