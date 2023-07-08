<script setup>
import { __ } from "@/translations.js"
import MenuItem from "./MenuItem.vue";

const props = defineProps({
  editor: {
    type: Object,
    required: true,
  },
});

const items = [
  {
    icon: "bold",
    title: __("Bold"),
    action: () => props.editor.chain().focus().toggleBold().run(),
    isActive: () => props.editor.isActive("bold"),
  },
  {
    icon: "italic",
    title: __("Italic"),
    action: () => props.editor.chain().focus().toggleItalic().run(),
    isActive: () => props.editor.isActive("italic"),
  },
  {
    icon: "strikethrough",
    title: __("Strike"),
    action: () => props.editor.chain().focus().toggleStrike().run(),
    isActive: () => props.editor.isActive("strike"),
  },
  {
    icon: "code-view",
    title: __("Code"),
    action: () => props.editor.chain().focus().toggleCode().run(),
    isActive: () => props.editor.isActive("code"),
  },
  {
    icon: "mark-pen-line",
    title: __("Highlight"),
    action: () => props.editor.chain().focus().toggleHighlight().run(),
    isActive: () => props.editor.isActive("highlight"),
  },
  {
    type: "divider",
  },
  {
    icon: "h-1",
    title: __("Heading 1"),
    action: () => props.editor.chain().focus().toggleHeading({ level: 1 }).run(),
    isActive: () => props.editor.isActive("heading", { level: 1 }),
  },
  {
    icon: "h-2",
    title: __("Heading 2"),
    action: () => props.editor.chain().focus().toggleHeading({ level: 2 }).run(),
    isActive: () => props.editor.isActive("heading", { level: 2 }),
  },
  {
    icon: "h-3",
    title: __("Heading 3"),
    action: () => props.editor.chain().focus().toggleHeading({ level: 3 }).run(),
    isActive: () => props.editor.isActive("heading", { level: 3 }),
  },
  {
    icon: "paragraph",
    title: __("Paragraph"),
    action: () => props.editor.chain().focus().setParagraph().run(),
    isActive: () => props.editor.isActive("paragraph"),
  },
  {
    icon: "list-unordered",
    title: __("Bullet List"),
    action: () => props.editor.chain().focus().toggleBulletList().run(),
    isActive: () => props.editor.isActive("bulletList"),
  },
  {
    icon: "list-ordered",
    title: __("Ordered List"),
    action: () => props.editor.chain().focus().toggleOrderedList().run(),
    isActive: () => props.editor.isActive("orderedList"),
  },
  {
    icon: "code-box-line",
    title: __("Code Block"),
    action: () => props.editor.chain().focus().toggleCodeBlock().run(),
    isActive: () => props.editor.isActive("codeBlock"),
  },
  {
    type: "divider",
  },
  {
    icon: "double-quotes-l",
    title: __("Blockquote"),
    action: () => props.editor.chain().focus().toggleBlockquote().run(),
    isActive: () => props.editor.isActive("blockquote"),
  },
  {
    icon: "separator",
    title: __("Horizontal Rule"),
    action: () => props.editor.chain().focus().setHorizontalRule().run(),
  },
  {
    type: "divider",
  },
  {
    icon: "text-wrap",
    title: __("Hard Break"),
    action: () => props.editor.chain().focus().setHardBreak().run(),
  },
  {
    icon: "format-clear",
    title: __("Clear Format"),
    action: () => props.editor.chain().focus().clearNodes().unsetAllMarks().run(),
  },
  {
    type: "divider",
  },
  {
    icon: "arrow-go-back-line",
    title: __("Undo"),
    action: () => props.editor.chain().focus().undo().run(),
  },
  {
    icon: "arrow-go-forward-line",
    title: __("Redo"),
    action: () => props.editor.chain().focus().redo().run(),
  },
];
</script>

<template>
  <div>
    <template v-for="(item, index) in items">
      <div class="divider" v-if="item.type === 'divider'" :key="`divider${index}`" />
      <menu-item v-else :key="index" v-bind="item" />
    </template>
  </div>
</template>

<style scoped>
.divider {
  background-color: rgba(#fff, 0.25);
  height: 1.25rem;
  margin-left: 0.5rem;
  margin-right: 0.75rem;
  width: 1px;
}
</style>
