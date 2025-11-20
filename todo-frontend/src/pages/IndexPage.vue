<template>
  <q-page class="flex flex-center">
    <div style="width: 500px; max-width: 90vw">
      <h4 class="text-center q-mb-md">Lista de Tarefas</h4>

      <q-input v-model="novaTarefaTitulo" label="Titulo da Tarefa" class="q-mb-md"></q-input>
      <q-input v-model="novaTarefaDescricao" label="Descrição da Tarefa" class="q-mb-md"></q-input>
      <q-btn label="Criar Nova Tarefa" color="primary" @click="criarTarefa" class="q-mb-md" />

      <q-list bordered separator rounded class="bg-white shadow-1">
        <q-item v-for="tarefa in tarefas" :key="tarefa.id">
          <q-item-section side>
            <q-checkbox v-model="tarefa.concluida" @click="atualizarTarefa(tarefa)" />
          </q-item-section>

          <q-item-section>
            <q-item-label>{{ tarefa.titulo }}</q-item-label>
            <q-item-label caption>{{ tarefa.descricao }}</q-item-label>
          </q-item-section>

          <q-item-section side>
            <q-btn flat round color="negative" icon="delete" @click="deletarTarefa(tarefa)" />
          </q-item-section>
        </q-item>
      </q-list>
    </div>
  </q-page>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import { useQuasar } from 'quasar'

const $q = useQuasar()
const tarefas = ref([])
const novaTarefaTitulo = ref('')
const novaTarefaDescricao = ref('')

const listarTarefas = async () => {
  const request = await axios.get('http://localhost/api/tarefa')

  tarefas.value = request.data
}
onMounted(() => {
  listarTarefas()
})

const criarTarefa = async () => {
  if (novaTarefaTitulo.value === '') return

  try {
    await axios.post('http://localhost/api/tarefa', {
      titulo: novaTarefaTitulo.value,
      descricao: novaTarefaDescricao.value,
      concluida: false,
    })

    $q.notify({ message: 'Tarefa criada com sucesso', color: 'positive' })
    novaTarefaTitulo.value = ''
    novaTarefaDescricao.value = ''

    listarTarefas()
  } catch (error) {
    $q.notify({
      message: error,
      color: 'negative',
    })
  }
}

const atualizarTarefa = async (tarefa) => {
  try {
    await axios.put(`http://localhost/api/tarefa/${tarefa.id}`, { concluida: tarefa.concluida })

    if (tarefa.concluida === true) {
      $q.notify({ message: 'Tarefa concluida', color: 'primary' })
    } else {
      $q.notify({ message: 'Tarefa aberta novamente', color: 'info' })
    }
  } catch (error) {
    $q.notify({
      message: error,
      color: 'negative',
    })
    tarefa.concluida = !tarefa.concluida
  }
}

const deletarTarefa = async (tarefa) => {
  try {
    await axios.delete(`http://localhost/api/tarefa/${tarefa.id}`)

    $q.notify({ message: 'Tarefa deletada com sucesso', color: 'positive' })
    listarTarefas()
  } catch (error) {
    $q.notify({
      message: error,
      color: 'negative',
    })
  }
}
</script>
