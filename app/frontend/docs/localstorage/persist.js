// @ts-nocheck
import { writable } from "svelte/store";

const isBrowser = typeof Storage !== "undefined";

export const persistable = (key, value) => {
  // ensure client-side
  if (!isBrowser) return writable(value);

  // load saved state from previous session
  const loaded =
    key in localStorage 
      ? JSON.parse(localStorage.getItem(key))
      : value;
  const store = writable(loaded);

  // listen to changes and save
  store.subscribe((value) => {
    localStorage.setItem(key, JSON.stringify(value));
  });

  return store;
};