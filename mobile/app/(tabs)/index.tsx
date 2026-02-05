import { View, Text, TextInput, FlatList, ActivityIndicator, TouchableOpacity } from "react-native";
import { useEffect, useState } from "react";

const BASE_URL = "http://127.0.0.1:8000";

export default function FoodsScreen() {
  const [foods, setFoods] = useState<any[]>([]);
  const [search, setSearch] = useState("");
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState("");

  async function load(q = "") {
    try {
      setError("");
      setLoading(true);
      const url =
        q && q.trim().length > 0
          ? `${BASE_URL}/api/foods?search=${encodeURIComponent(q)}`
          : `${BASE_URL}/api/foods`;

      const res = await fetch(url);
      if (!res.ok) throw new Error("API error");
      const data = await res.json();
      setFoods(data);
    } catch (e: any) {
      setError(e.message);
      setFoods([]);
    } finally {
      setLoading(false);
    }
  }

  useEffect(() => {
    load();
  }, []);

  return (
    <View style={{ flex: 1, padding: 16 }}>
      <Text style={{ fontSize: 22, fontWeight: "700", marginBottom: 10 }}>
        Foods & Drinks
      </Text>

      <TextInput
        value={search}
        onChangeText={setSearch}
        placeholder="Search foods…"
        style={{
          borderWidth: 1,
          borderColor: "#ccc",
          borderRadius: 10,
          padding: 10,
          marginBottom: 10,
        }}
      />

      <TouchableOpacity
        onPress={() => load(search)}
        style={{
          backgroundColor: "#111827",
          padding: 12,
          borderRadius: 10,
          marginBottom: 12,
        }}
      >
        <Text style={{ color: "white", textAlign: "center" }}>Search</Text>
      </TouchableOpacity>

      {loading ? (
        <ActivityIndicator size="large" />
      ) : error ? (
        <Text style={{ color: "red" }}>{error}</Text>
      ) : (
        <FlatList
          data={foods}
          keyExtractor={(item) => String(item.id)}
          renderItem={({ item }) => (
            <View style={{ paddingVertical: 12, borderBottomWidth: 1, borderBottomColor: "#eee" }}>
              <Text style={{ fontWeight: "700" }}>
                {item.name_en} {item.name_local ? `(${item.name_local})` : ""}
              </Text>
              <Text>
                {item.serving_label} • {item.carbs_per_serving}g carbs
              </Text>
            </View>
          )}
        />
      )}
    </View>
  );
}
