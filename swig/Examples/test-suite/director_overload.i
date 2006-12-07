%module(directors="1") director_overload

%feature("director");

#ifdef SWIGPYTHON
%feature("director:except") {
  if ($error != NULL) {
    throw Swig::DirectorMethodException();
  }
}
#endif

#ifdef SWIGRUBY
// Catch ruby exceptions in directors
%feature("director:except") {
 throw Swig::DirectorMethodException($error);
}
#endif

%inline %{

class OverloadedClass
{
public:
  virtual ~OverloadedClass() {}
  virtual void method1() const {}
  virtual void method2() const {}
  virtual void method3() const {}
  // test overloaded method, but not directly after the first method
  virtual void method2(bool b) const {}
};

%}

