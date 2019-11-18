<template>
    <v-container fluid>
        <v-card>
            <v-list>
                <v-list-group
                    v-for="item in items"
                    :key="item.title"
                    v-model="item.active"
                    :prepend-icon="item.action"
                    no-action
                >
                    <template v-slot:activator>
                        <v-list-item-content>
                            <v-list-item-title
                                v-text="item.title"
                            ></v-list-item-title>
                        </v-list-item-content>
                    </template>

                    <v-list-item
                        v-for="subItem in item.items"
                        :key="subItem.title"
                        @click
                    >
                        <v-list-item-content>
                            <v-list-item-title
                                v-text="subItem.title"
                            ></v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list-group>
            </v-list>
            <GChart
                type="ColumnChart"
                :data="chartData"
                :options="chartOptions"
            />
        </v-card>
    </v-container>
</template>

<script>
export default {
    data() {
        return {
            items: [
                {
                    action: 'mdi-trash-can',
                    title: 'Trash Can #X',
                    items: [
                        { title: 'List Item' },
                        { title: 'List Item' },
                        { title: 'List Item' }
                    ]
                },
                {
                    action: 'mdi-trash-can',
                    title: 'Trash Can #Y',
                    items: [
                        { title: 'Breakfast & brunch' },
                        { title: 'New American' },
                        { title: 'Sushi' }
                    ]
                }
            ],
            chartData: [
                ['Year', 'Sales', 'Expenses', 'Profit'],
                ['2014', 1000, 400, 200],
                ['2015', 1170, 460, 250],
                ['2016', 660, 1120, 300],
                ['2017', 1030, 540, 350]
            ],
            chartOptions: {
                chart: {
                    title: 'Company Performance',
                    subtitle: 'Sales, Expenses, and Profit: 2014-2017'
                }
            }
        };
    }
};
</script>
