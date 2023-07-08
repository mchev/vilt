<script setup>
import { ref, onMounted, onBeforeUnmount, watch } from "vue";
import { Editor, EditorContent } from "@tiptap/vue-3";

import StarterKit from "@tiptap/starter-kit";
import Highlight from "@tiptap/extension-highlight";

import MenuBar from "./Editor/MenuBar.vue";

const props = defineProps({
  modelValue: {
    type: String,
    required: true,
  },
});

const emit = defineEmits(["update:modelValue"]);

const editor = ref(null);
const emitAfterOnUpdate = ref(false);

onMounted(() => {
  editor.value = new Editor({
    content: props.modelValue,
    extensions: [StarterKit, Highlight],
    editorProps: {
      attributes: {
        class:
          "w-full h-full min-h-[40rem] prose dark:prose-invert p-2 focus:outline-none text-gray-900 bg-gray-50 rounded-b-lg dark:bg-gray-700 dark:text-white max-w-full",
      },
    },
    onUpdate: () => {
      emitAfterOnUpdate.value = true;
      emit("update:modelValue", editor.value.getHTML());
    },
  });
});

watch(
  () => props.modelValue,
  (newValue) => {
    if (emitAfterOnUpdate.value) {
      emitAfterOnUpdate.value = false;
      return;
    }
    if (editor.value) editor.value.setContent(newValue);
  }
);

onBeforeUnmount(() => {
  editor.value.destroy();
});
</script>
<template>
  <div v-if="editor" class="flex flex-col w-full">
    <MenuBar :editor="editor" class="flex items-center sticky top-0 z-20 bg-gray-200 dark:bg-gray-800 border-b-3 border-gray-900 rounded-t-lg flex-wrap p-1" />
    <EditorContent class="w-full flex-grow" :editor="editor" />
  </div>
</template>
