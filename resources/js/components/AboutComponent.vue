<template>
  <v-container fluid>
    <br />

    <!-- Project Info -->
    <div>
      <h4>Project info:</h4>
      <p>Hoje em dia, uma das maiores preocupações com o meio ambiente tem sido a organização da recolha do lixo que afeta a saúde e o meio ambiente da nossa sociedade. A deteção, monitorização e organização da recolha do lixo é um dos principais problemas atualmente visto nas grandes cidades. A maneira tradicional de monitorizar manualmente os resíduos nas lixeiras é um processo complicado que utiliza bastante esforço humano e tem custos que podem ser facilmente evitados com as novas tecnologias.</p>
      <p>Desta forma, apresentamos como solução um projeto que introduz uma invocação única da Internet das Coisas e que tem como objetivo melhorar a utilização de recursos e diminuir o seu gasto de forma automática. Por isto, o nosso projeto, Smart Trash, é uma ideia inovadora que vai permitir que a recolha de resíduos seja feita de uma melhor forma e mais saudável para o meio ambiente.</p>
      <p>No mundo real, é um caso de uso para as smart cities. Para o Departamento Municipal que tem a responsabilidade da recolha do lixo, este projeto em grande escala poderia ajudar bastante porque permite saber quais os contentores que necessitam de ser recolhidos, assim como as zonas que precisam de ser recolhidas mais frequentemente, fazendo o horário de recolha e dos trabalhadores de forma mais eficiente para que consigamos poupar recursos.</p>
      <p>Neste projeto, iremos implementar a solução num contentor de lixo normal. Desta maneira, vamos monitorizar a capacidade em que se encontra o contentor utilizando pelo menos um sensor de distância, sendo enviando uma notificação quando o contentor se encontrar a uma percentagem (70%/80% cheio), ainda por definir. Também, iremos colocar um sensor de temperatura para que em caso de altas temperaturas ou de perigo de incêndio seja enviado uma notificação de alerta, Sensor de Chama e Fogo para caso real de fogo, Sensor dos gases de Dióxido de Carbono (CO2) e Metano (MQ-4) para o controlo do ar. De seguida, instalaremos um sistema de RFID para que quem vá recolher o lixo possa abrir o contentor do lixo, servindo este também como proteção para os aparelhos utilizados. Por fim, vamos guardar toda a informação numa base de dados para que fique armazenado quem recolhe o lixo, as horas em que foi recolhido assim como qual o contentor em que o lixo foi recolhido. Armazenar todos os dados numa base de dados, para que fique guardada toda a informação possível, possibilita que no futuro possamos fazer estudos e calcular estatísticas de modo a melhorar a recolha do lixo.</p>
    </div>

    <br />

    <!-- Developers -->
    <h4>Developed by:</h4>
    <v-row dense>
      <v-col v-for="card in cards" :key="card.title" :cols="card.flex">
        <v-card>
          <v-img
            :src="card.src"
            class="white--text align-end mx-auto"
            gradient="to bottom, rgba(0,0,0,.1), rgba(0,0,0,.5)"
            height="400px"
          >
            <v-card-title v-text="card.title"></v-card-title>
          </v-img>

          <v-card-actions>
            <v-spacer></v-spacer>

            <v-btn icon :href="card.facebook">
              <v-icon>mdi-facebook-box</v-icon>
            </v-btn>

            <v-btn icon :href="card.linkedIn">
              <v-icon>mdi-linkedin-box</v-icon>
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>


<script>
export default {
  data: () => ({
    cards: [
      {
        title: "Daniel Rodrigues",
        src:
          "https://z-m-scontent.flis5-1.fna.fbcdn.net/v/t1.0-9/11350580_856837901090657_2103519197645713210_n.jpg?_nc_cat=111&_nc_oc=AQnlQwUens0Zdr0cuHZ8bvbYLpGuqGQc7URgkqbGDyTYugj2qGa-1ex8BSfJVx-pLfc&_nc_ad=z-m&_nc_cid=1272&_nc_zor=9&_nc_ht=z-m-scontent.flis5-1.fna&oh=8124777afef24bf593c53bfc86a550ca&oe=5E62875D",
        flex: 3,
        facebook: "https://www.facebook.com/profile.php?id=100002933664528",
        linkedIn: ""
      },
      {
        title: "Luís Campos",
        src:
          "https://z-m-scontent.flis5-1.fna.fbcdn.net/v/t1.0-9/68429144_2322899487757920_4621444209893703680_n.jpg?_nc_cat=104&_nc_oc=AQlw_KsMnJ_MFZa3laR-JJXpRQxFK900j3Qe5dgA2vKLikgqmj5XJ_kgoTxnc-7emaQ&_nc_ad=z-m&_nc_cid=1272&_nc_zor=9&_nc_ht=z-m-scontent.flis5-1.fna&oh=ca1fec54be9140845b275382e9b42130&oe=5E47EA12",
        flex: 3,
        facebook: "https://www.facebook.com/mrmoltres",
        linkedIn: "https://www.linkedin.com/in/lu%C3%ADs-campos-57bb3612b/"
      },
      {
        title: "Luís Ferreira",
        src:
          "https://z-m-scontent.flis5-1.fna.fbcdn.net/v/t1.0-9/46860520_2342398075789029_3334635084178259968_o.jpg?_nc_cat=101&_nc_oc=AQkZktOOd49OKdvHNemz9KOfBDzu6HUuD8ULHnGps40AO1Xd-aybzlFR1Nt9hXvfbkQ&_nc_ad=z-m&_nc_cid=1272&_nc_zor=9&_nc_ht=z-m-scontent.flis5-1.fna&oh=fd91d10fea09565df417018dde667fc0&oe=5E59A5A9",
        flex: 3,
        facebook: "https://www.facebook.com/luispaulo.97",
        linkedIn: "https://www.linkedin.com/in/luispauloferreira/"
      },
      {
        title: "Rodrigo Santos",
        src:
          "https://z-m-scontent.flis5-1.fna.fbcdn.net/v/t1.0-9/12038209_932643853475988_6450784216033743893_n.jpg?_nc_cat=103&_nc_oc=AQlP4yS7cYCvjzOwA0Dbukl34QH3-O7-_qy_FY29tFg5QeB00xO8aUrALqGkQjHnlFo&_nc_ad=z-m&_nc_cid=1272&_nc_zor=9&_nc_ht=z-m-scontent.flis5-1.fna&oh=84260068536b1cc0191c26a52ff98b62&oe=5E530CA1",
        flex: 3,
        facebook: "https://www.facebook.com/rodrigo.h.f.santos",
        linkedIn: "https://www.linkedin.com/in/rodrigohfsantos/"
      }
    ]
  })
};
</script>
