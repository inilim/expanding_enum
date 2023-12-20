<?php

namespace Inilim\Trait\Enum;

use Closure;
use ArrayAccess;
use InvalidArgumentException;

/**
 * Laravel Helpers Package
 */
class Array_
{
   /**
    * проверка на многомерный массив
    * true - многомерный
    * false - одномерный
    */
   public function isMultidimensional(array $arr): bool
   {
      return (count($arr) - count($arr, COUNT_RECURSIVE)) !== 0;
   }

   /**
    * Return the default value of the given value.
    *
    * @param  mixed $value
    * @return mixed
    */
   public function value($value)
   {
      return $value instanceof Closure ? $value() : $value;
   }

   /**
    * Determine whether the given value is array accessible.
    *
    * @param  mixed  $value
    *
    * @return bool
    */
   public function accessible($value): bool
   {
      return is_array($value) || $value instanceof ArrayAccess;
   }

   /**
    * Add an element to an array using "dot" notation if it doesn't exist.
    *
    * @param  array  $array
    * @param  string  $key
    * @param  mixed  $value
    *
    * @return array
    */
   public function add(array $array, string $key, $value): array
   {
      if (is_null($this->get($array, $key))) {
         $this->set($array, $key, $value);
      }

      return $array;
   }

   /**
    * Collapse an array of arrays into a single array.
    *
    * @param  iterable  $array
    *
    * @return array
    */
   public function collapse(iterable $array): array
   {
      $results = [];

      foreach ($array as $values) {
         if (!is_array($values)) {
            continue;
         }

         $results[] = $values;
      }

      return array_merge([], ...$results);
   }

   /**
    * Cross join the given arrays, returning all possible permutations.
    *
    * @param  iterable  ...$arrays
    *
    * @return array
    */
   public function crossJoin(...$arrays): array
   {
      $results = [[]];

      foreach ($arrays as $index => $array) {
         $append = [];

         foreach ($results as $product) {
            foreach ($array as $item) {
               $product[$index] = $item;

               $append[] = $product;
            }
         }

         $results = $append;
      }

      return $results;
   }

   /**
    * Divide an array into two arrays. One with keys and the other with values.
    *
    * @param  array  $array
    *
    * @return array
    */
   public function divide(array $array): array
   {
      return [array_keys($array), array_values($array)];
   }

   /**
    * Flatten a multi-dimensional associative array with dots.
    *
    * @param  iterable  $array
    * @param  string  $prepend
    *
    * @return array
    */
   public function dot(iterable $array, string $prepend = ''): array
   {
      $results = [];

      foreach ($array as $key => $value) {
         if (is_array($value) && !empty($value)) {
            $results = array_merge($results, $this->dot($value, $prepend . $key . '.'));
         } else {
            $results[$prepend . $key] = $value;
         }
      }

      return $results;
   }

   /**
    * Get all of the given array except for a specified array of keys.
    *
    * @param  array  $array
    * @param  array|string  $keys
    *
    * @return array
    */
   public function except(array $array, $keys): array
   {
      $this->forget($array, $keys);

      return $array;
   }

   /**
    * Determine if the given key exists in the provided array.
    *
    * @param  \ArrayAccess|array  $array
    * @param  string|int  $key
    *
    * @return bool
    */
   public function exists($array, $key): bool
   {
      if ($array instanceof ArrayAccess) {
         return $array->offsetExists($key);
      }

      return array_key_exists($key, $array);
   }

   /**
    * Flatten a multi-dimensional array into a single level.
    *
    * @param  iterable  $array
    * @param  int  $depth
    *
    * @return array
    */
   public function flatten(iterable $array, int $depth): array
   {
      $result = [];

      foreach ($array as $item) {
         if (!is_array($item)) {
            $result[] = $item;
         } else {
            $values = $depth === 1
               ? array_values($item)
               : $this->flatten($item, $depth - 1);

            foreach ($values as $value) {
               $result[] = $value;
            }
         }
      }

      return $result;
   }

   /**
    * Remove one or many array items from a given array using "dot" notation.
    *
    * @param  array  $array
    * @param  array|string  $keys
    *
    * @return void
    */
   public function forget(array &$array, $keys)
   {
      $original = &$array;

      $keys = (array) $keys;

      if (count($keys) === 0) {
         return;
      }

      foreach ($keys as $key) {
         // if the exact key exists in the top-level, remove it
         if ($this->exists($array, $key)) {
            unset($array[$key]);

            continue;
         }

         $parts = explode('.', $key);

         // clean up before each pass
         $array = &$original;

         while (count($parts) > 1) {
            $part = array_shift($parts);

            if (isset($array[$part]) && is_array($array[$part])) {
               $array = &$array[$part];
            } else {
               continue 2;
            }
         }

         unset($array[array_shift($parts)]);
      }
   }

   /**
    * Get an item from an array using "dot" notation.
    *
    * @param  \ArrayAccess|array  $array
    * @param  string|int|null  $key
    * @param  mixed  $default
    *
    * @return mixed
    */
   public function get($array, $key, $default = null)
   {
      if (!$this->accessible($array)) {
         return $this->value($default);
      }

      if (is_null($key)) {
         return $array;
      }

      if ($this->exists($array, $key)) {
         return $array[$key];
      }

      if (strpos(strval($key), '.') === false) {
         return $array[$key] ?? $this->value($default);
      }

      foreach (explode('.', strval($key)) as $segment) {
         if ($this->accessible($array) && $this->exists($array, $segment)) {
            $array = $array[$segment];
         } else {
            return $this->value($default);
         }
      }

      return $array;
   }

   /**
    * Check if an item or items exist in an array using "dot" notation.
    *
    * @param  \ArrayAccess|array  $array
    * @param  string|array  $keys
    *
    * @return bool
    */
   public function has($array, $keys): bool
   {
      $keys = (array) $keys;

      if (!$array || $keys === []) {
         return false;
      }

      foreach ($keys as $key) {
         $subKeyArray = $array;

         if ($this->exists($array, $key)) {
            continue;
         }

         foreach (explode('.', $key) as $segment) {
            if ($this->accessible($subKeyArray) && $this->exists($subKeyArray, $segment)) {
               $subKeyArray = $subKeyArray[$segment];
            } else {
               return false;
            }
         }
      }

      return true;
   }

   /**
    * Determine if any of the keys exist in an array using "dot" notation.
    *
    * @param  \ArrayAccess|array  $array
    * @param  string|string[]  $keys
    *
    * @return bool
    */
   public function hasAny($array, $keys): bool
   {
      if (is_null($keys)) {
         return false;
      }

      $keys = (array) $keys;

      if (!$array) {
         return false;
      }

      if ($keys === []) {
         return false;
      }

      foreach ($keys as $key) {
         if ($this->has($array, $key)) {
            return true;
         }
      }

      return false;
   }

   /**
    * Determines if an array is associative.
    *
    * An array is "associative" if it doesn't have sequential numerical keys beginning with zero.
    *
    * @param  array  $array
    *
    * @return bool
    */
   public function isAssoc(array $array): bool
   {
      $keys = array_keys($array);

      return array_keys($keys) !== $keys;
   }

   /**
    * Get a subset of the items from the given array.
    *
    * @param  array  $array
    * @param  array|string  $keys
    *
    * @return array
    */
   public function only(array $array, $keys): array
   {
      return array_intersect_key($array, array_flip((array) $keys));
   }

   /**
    * Pluck an array of values from an array.
    *
    * @param  iterable  $array
    * @param  string|array|int|null  $value
    * @param  string|array|null  $key
    *
    * @return array
    */
   public function pluck(iterable $array, $value, $key = null): array
   {
      $results = [];

      $value = is_string($value) ? explode('.', $value) : $value;

      $key = is_null($key) || is_array($key) ? $key : explode('.', $key);

      foreach ($array as $item) {
         $itemValue = $this->dataGet($item, $value);

         // If the key is "null", we will just append the value to the array and keep
         // looping. Otherwise we will key the array using the value of the key we
         // received from the developer. Then we'll return the final array form.
         if (is_null($key)) {
            $results[] = $itemValue;
         } else {
            $itemKey = $this->dataGet($item, $key);

            if (is_object($itemKey) && method_exists($itemKey, '__toString')) {
               $itemKey = (string) $itemKey;
            }

            $results[$itemKey] = $itemValue;
         }
      }

      return $results;
   }

   /**
    * Push an item onto the beginning of an array.
    *
    * @param  array  $array
    * @param  mixed  $value
    * @param  mixed  $key
    *
    * @return array
    */
   public function prepend(array $array, $value, $key = null): array
   {
      if (func_num_args() === 2) {
         array_unshift($array, $value);
      } else {
         $array = [$key => $value] + $array;
      }

      return $array;
   }

   /**
    * Get a value from the array, and remove it.
    *
    * @param  array  $array
    * @param  string  $key
    * @param  mixed  $default
    *
    * @return mixed
    */
   public function pull(array &$array, string $key, $default = null)
   {
      $value = $this->get($array, $key, $default);

      $this->forget($array, $key);

      return $value;
   }

   /**
    * Get one or a specified number of random values from an array.
    *
    * @param  array  $array
    * @param  int|null  $number
    * @param  bool|false  $preserveKeys
    *
    * @return mixed
    *
    * @throws \InvalidArgumentException
    */
   public function random(array $array, ?int $number = null, bool $preserveKeys)
   {
      $requested = is_null($number) ? 1 : $number;

      $count = count($array);

      if ($requested > $count) {
         throw new InvalidArgumentException(
            "You requested {$requested} items, but there are only {$count} items available."
         );
      }

      if (is_null($number)) {
         return $array[array_rand($array)];
      }

      if ((int) $number === 0) {
         return [];
      }

      $keys = array_rand($array, $number);

      $results = [];

      if ($preserveKeys) {
         foreach ((array) $keys as $key) {
            $results[$key] = $array[$key];
         }
      } else {
         foreach ((array) $keys as $key) {
            $results[] = $array[$key];
         }
      }

      return $results;
   }

   /**
    * Set an array item to a given value using "dot" notation.
    *
    * If no key is given to the method, the entire array will be replaced.
    *
    * @param  array  $array
    * @param  string|null  $key
    * @param  mixed  $value
    *
    * @return array
    */
   public function set(array &$array, ?string $key, $value): array
   {
      if (is_null($key)) {
         return $array = $value;
      }

      $keys = explode('.', $key);

      foreach ($keys as $i => $key) {
         if (count($keys) === 1) {
            break;
         }

         unset($keys[$i]);

         // If the key doesn't exist at this depth, we will just create an empty array
         // to hold the next value, allowing us to create the arrays to hold final
         // values at the correct depth. Then we'll keep digging into the array.
         if (!isset($array[$key]) || !is_array($array[$key])) {
            $array[$key] = [];
         }

         $array = &$array[$key];
      }

      $array[array_shift($keys)] = $value;

      return $array;
   }

   /**
    * Shuffle the given array and return the result.
    *
    * @param  array  $array
    * @param  int|null  $seed
    *
    * @return array
    */
   public function shuffle(array $array, int $seed = null): array
   {
      if (is_null($seed)) {
         shuffle($array);
      } else {
         mt_srand($seed);
         shuffle($array);
         mt_srand();
      }

      return $array;
   }

   /**
    * Recursively sort an array by keys and values.
    *
    * @param  array  $array
    * @param  int  $options
    * @param  bool  $descending
    *
    * @return array
    */
   public function sortRecursive(array $array, int $options = SORT_REGULAR, bool $descending = true): array
   {
      foreach ($array as &$value) {
         if (is_array($value)) {
            $value = $this->sortRecursive($value, $options, $descending);
         }
      }

      if ($this->isAssoc($array)) {
         $descending
            ? krsort($array, $options)
            : ksort($array, $options);
      } else {
         $descending
            ? rsort($array, $options)
            : sort($array, $options);
      }

      return $array;
   }

   /**
    * Filter the array using the given callback. array_filter
    *
    * @param  array  $array
    * @param  callable  $callback
    * @return array
    */
   public function where(array $array, callable $callback): array
   {
      return array_filter($array, $callback, ARRAY_FILTER_USE_BOTH);
   }

   /**
    * If the given value is not an array and not null, wrap it in one.
    *
    * @param  mixed  $value
    * @return array
    */
   public function wrap($value): array
   {
      if (is_null($value)) {
         return [];
      }

      return is_array($value) ? $value : [$value];
   }

   /**
    * Fill in data where it's missing.
    *
    * @param  mixed  $target
    * @param  string|array  $key
    * @param  mixed  $value
    * @return mixed
    */
   public function dataFill(&$target, $key, $value)
   {
      return $this->dataSet($target, $key, $value, false);
   }

   /**
    * Get an item from an array or object using "dot" notation.
    *
    * @param  mixed  $target
    * @param  string|array|int|null  $key
    * @param  mixed  $default
    * @return mixed
    */
   public function dataGet($target, $key, $default = null)
   {
      if (is_null($key)) {
         return $target;
      }

      $key = is_array($key) ? $key : explode('.', $key);

      foreach ($key as $i => $segment) {
         unset($key[$i]);

         if (is_null($segment)) {
            return $target;
         }

         if ($segment === '*') {
            if (!is_array($target)) {
               return $this->value($default);
            }

            $result = [];

            foreach ($target as $item) {
               $result[] = $this->dataGet($item, $key);
            }

            return in_array('*', $key) ? $this->collapse($result) : $result;
         }

         if ($this->accessible($target) && $this->exists($target, $segment)) {
            $target = $target[$segment];
         } elseif (is_object($target) && isset($target->{$segment})) {
            $target = $target->{$segment};
         } else {
            return $this->value($default);
         }
      }

      return $target;
   }

   /**
    * Set an item on an array or object using dot notation.
    *
    * @param  mixed  $target
    * @param  string|array  $key
    * @param  mixed  $value
    * @param  bool  $overwrite
    *
    * @return mixed
    */
   public function dataSet(&$target, $key, $value, bool $overwrite = true)
   {
      $segments = is_array($key) ? $key : explode('.', $key);

      if (($segment = array_shift($segments)) === '*') {
         if (!$this->accessible($target)) {
            $target = [];
         }

         if ($segments) {
            foreach ($target as &$inner) {
               $this->dataSet($inner, $segments, $value, $overwrite);
            }
         } elseif ($overwrite) {
            foreach ($target as &$inner) {
               $inner = $value;
            }
         }
      } elseif ($this->accessible($target)) {
         if ($segments) {
            if (!$this->exists($target, $segment)) {
               $target[$segment] = [];
            }

            $this->dataSet($target[$segment], $segments, $value, $overwrite);
         } elseif ($overwrite || !$this->exists($target, $segment)) {
            $target[$segment] = $value;
         }
      } elseif (is_object($target)) {
         if ($segments) {
            if (!isset($target->{$segment})) {
               $target->{$segment} = [];
            }

            $this->dataSet($target->{$segment}, $segments, $value, $overwrite);
         } elseif ($overwrite || !isset($target->{$segment})) {
            $target->{$segment} = $value;
         }
      } else {
         $target = [];

         if ($segments) {
            $this->dataSet($target[$segment], $segments, $value, $overwrite);
         } elseif ($overwrite) {
            $target[$segment] = $value;
         }
      }

      return $target;
   }

   /**
    * Get the first element of an array. Useful for method chaining.
    *
    * @param  array  $array
    *
    * @return mixed
    */
   public function head(array $array)
   {
      return reset($array);
   }

   /**
    * Get the last element from an array.
    *
    * @param  array  $array
    *
    * @return mixed
    */
   public function last(array $array)
   {
      return end($array);
   }
}
