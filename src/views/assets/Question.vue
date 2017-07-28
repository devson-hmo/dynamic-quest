<template>
   <form action="#">
          
        <div class="row">
            <button class="btn btn-primary btn-sm pull-right" @click.prevent="saveQuestionaire">Guardar Cuestionario</button>
            
            <div class="col-md-3">
                <div :class="{'from-group': true ,'has-error': errors.has('questionaireName') }">
                    <label>Nombre Cuestionario</label>
                    <input type="text" v-model="questionaireName"  v-validate data-vv-rules="required" name="questionaireName" class="form-control input-sm">
                    <span v-show="errors.has('questionaireName')" class="help is-danger">{{ errors.first('questionaireName') }}</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-11 col-md-offset-1">
                <button class="btn btn-success btn-xs" v-on:click.prevent="addSection">Agregar Seccion</button>
                
                <div class="row">
                    <div class="sections col-md-3" v-for="(section, sindex) in sections">
                        <div :class="{'from-group': true ,'has-error': errors.has('sectionName') }" >
                            <div class="well well-sm">
                                <label>Nombre seccion</label>
                                <input type="text" v-validate data-vv-rules="required" name="sectionName" v-model="section.name" class="form-control input-sm">
                                <i v-show="errors.has('sectionName')" class="fa fa-warning"></i>
                                <span v-show="errors.has('sectionName')" class="help is-danger">{{ errors.first('sectionName') }}</span>
                            </div>
                        </div>
                        
                        <button class="btn btn-success btn-xs col-md-offset-1" v-on:click.self.prevent="addQuestion(sindex)">
                            Agregar pregunta
                        </button>

                        <div class="questions" v-for="(question, qindex) in section.questions">
                            <div class="well well-sm col-md-11 col-md-offset-1">
                                <div :class="{'from-group': true ,'has-error': errors.has('sectionName') }">
                                    <label>Pregunta</label>
                                    <input type="text" v-validate data-vv-rules="required" name="questionName" v-model="question.question" class="form-control input-sm">
                                    <i v-show="errors.has('questionName')" class="fa fa-warning"></i>
                                    <span v-show="errors.has('questionName')" class="help is-danger">{{ errors.first('questionName') }}</span>
                                </div>
                                <div :class="{'from-group': true ,'has-error': errors.has('sectionName') }">
                                    <label>Tipo Pregunta</label>
                                    <select class="form-control input-sm" v-model="question.type"  v-validate data-vv-rules="required" name="questionType">
                                        <option value="text" selected>Texto</option>
                                        <option value="number">Numero</option>
                                        <option value="boolean">Si/No</option>
                                        <option value="array">Multiple</option>
                                        <option value="client">Cliente</option>
                                        <option value="city">Ciudad</option>
                                        <option value="supplier">Proveedor</option>
                                    </select>
                                    <i v-show="errors.has('questionType')" class="fa fa-warning"></i>
                                    <span v-show="errors.has('questionType')" class="help is-danger">{{ errors.first('questionType') }}</span>
                                </div>
                            </div>
                            
                            <button class="btn btn-xs btn-success col-md-offset-2" v-if="question.type == 'array'" @click.prevent="addAnswers(question)">Agregar respuesta</button>
                            
                            <div class="has-answers" v-if="question.type == 'array'">
                                
                                <div class="answers" v-for="answer in question.answers">
                                    <div class="well well-smMues col-md-offset-2">
                                        <div class="form-group">
                                            <label>Label</label>
                                            <input type="text" v-model="answer.label" class="form-control input-sm" />
                                        </div>
                                        <div class="form-group">
                                            <label>Value</label>
                                            <input type="text" v-model="answer.label" class="form-control input-sm" />
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
export default {
    mounted() {
        this.sections.push(JSON.parse(JSON.stringify(this.template_sections)));
    },
    methods: {
        saveQuestionaire() {
            this.$validator.validateAll().then(result => {
                if(result) {
                    let request = {
                        questionaireName: this.questionaireName,
                        sections: this.sections
                    };
                    
                    axios.post(serverJS + "/api/questionaire", request)
                    .then(res => {

                    });
                }
            });
        },
        addAnswers(question) {
            console.log(this.template_sections.questions[0].answers[0]);
            question.answers.push(JSON.parse(JSON.stringify(this.template_sections.questions[0].answers)));
        },
        addQuestion(index) {
            if(typeof this.sections[index] != "undefined") {
                this.sections[index].questions.push(JSON.parse(JSON.stringify(this.template_sections.questions[0])));
            }
        },
        addSection() {
            this.sections.push(JSON.parse(JSON.stringify(this.template_sections)));
        }
    },
    data() {
        return {
            template_sections: {
                name: "",
                questions: [
                    {
                        question: "",
                        type: "bool",
                        answers: [{label: "", value: ""}]
                    }
                ]
            },
            questionaireName: "",
            sections: []
        }
    }
}
</script>

